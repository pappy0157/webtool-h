<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\User;
use App\Settings\SassFeatures;
use Illuminate\Http\Request;

class PaymentController extends Base
{
    public function pricing(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        return view('payments.pricing', [
            'title' => 'Pricing',
            'description' => 'Our Premium Plans alongside their Pricing.',
            'keywords' => '',
        ]);
    }

    public function monthly(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        if(auth()->user()->subscription_id || auth()->user()->allow_till > now())
            return redirect()->route('already.subscribed');

        \Stripe\Stripe::setApiKey($sassFeatures->stripePrivate);

        $product = \Stripe\Product::create([
            'name' => 'Premium for ' . auth()->user()->email
        ]);

        $price = \Stripe\Price::create([
            'product' => $product->id,
            'unit_amount' => $sassFeatures->premiumPriceMonthly * 100,
            'currency' => 'usd',
            'recurring' => [ 'interval' => 'month' ]
        ]);

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1
                ]
            ],
            'mode' => 'subscription',
            'success_url' => url('/payments/success'),
            'cancel_url'  => url('/payments/cancel')
        ]);

        $checkout = new Checkout();
        
        $checkout->user_id         = auth()->user()->id;
        $checkout->checkout_id     = $session->id;
        $checkout->status          = $session->status;
        $checkout->subscription_id = $session->subscription;
        $checkout->type            = 'month';

        $checkout->save();

        return redirect($session->url);
    }

    public function annually(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        if(auth()->user()->subscription_id || auth()->user()->allow_till > now())
            return redirect()->route('already.subscribed');

        \Stripe\Stripe::setApiKey($sassFeatures->stripePrivate);

        $product = \Stripe\Product::create([
            'name' => 'Premium for ' . auth()->user()->email
        ]);

        $price = \Stripe\Price::create([
            'product' => $product->id,
            'unit_amount' => $sassFeatures->premiumPriceAnnually * 100,
            'currency' => 'usd',
            'recurring' => [ 'interval' => 'year' ]
        ]);

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1
                ]
            ],
            'mode' => 'subscription',
            'success_url' => url('/payments/success'),
            'cancel_url'  => url('/payments/cancel')
        ]);

        $checkout = new Checkout();
        
        $checkout->user_id         = auth()->user()->id;
        $checkout->checkout_id     = $session->id;
        $checkout->status          = $session->status;
        $checkout->subscription_id = $session->subscription;
        $checkout->type            = 'year';

        $checkout->save();

        return redirect($session->url);
    }

    public function cancelConfirmation(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        if(!auth()->user()->subscription_id)
            return redirect('/');

        return view('payments.cancel-confirmation', [
            'title' => 'Cancel your Subscription',
            'description' => 'Are you sure you want to cancel your subscription?',
            'keywords' => ''
        ]);
    }

    public function alreadySubscribed(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        if(auth()->user()->subscription_id || auth()->user()->allow_till > now())
            return view('payments.already-subscribed', [
                'title' => 'Already Subscribed',
                'description' => 'You have already subscribed to the premium plan.',
                'keywords' => ''
            ]);

        return redirect('/');
    }

    public function delete(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        if(!auth()->user()->subscription_id)
            return redirect('/');

        \Stripe\Stripe::setApiKey($sassFeatures->stripePrivate);

        try {
            $sub = \Stripe\Subscription::retrieve(auth()->user()->subscription_id);

            if($sub) {
                $sub->cancel();
            }
        } catch(\Stripe\Exception\InvalidRequestException $e) {

        }

        $checkout = Checkout::where('user_id', auth()->user()->id)->first();

        $user = User::where('id', auth()->user()->id)->first();
        $user->subscription_id = NULL;

        $term = $checkout->type == 'month' ? \Carbon\Carbon::parse($checkout->created_at)->addMonth() : \Carbon\Carbon::parse($checkout->created_at)->addYear();

        if($term > now()) {
            $user->allow_till = $term;
        }

        $user->save();
        $checkout->delete();

        return redirect('/auth/manage')->with('cancelled', TRUE);
    }

    public function success(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        return view('payments.success', [
            'title' => 'Payment Successful',
            'description' => 'Your Payment was Successful. Thank you for your purchase.',
            'keywords' => ''
        ]);
    }

    public function cancel(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        return view('payments.cancel', [
            'title' => 'Payment Cancelled',
            'description' => 'Your Payment was cancelled. You have not been charged.',
            'keywords' => ''
        ]);
    }

    public function webhookHandler(SassFeatures $sassFeatures, Request $request) {
        if(!$sassFeatures->status)
            return redirect('/');

        $stripe = $request->input();

        switch($stripe['type']) {
            case 'checkout.session.completed':
                $session = $stripe['data']['object'];

                $checkout = Checkout::where('checkout_id', $session['id'])->first();

                $checkout->subscription_id = $session['subscription'];
                $checkout->status          = $session['status'];

                $user = User::find($checkout->user_id);

                $user->subscription_id = $checkout->subscription_id;

                $user->save();
                $checkout->save();
            break;

            case 'customer.subscription.deleted':
                $subscription = $stripe['data']['object'];

                $user = User::where('subscription_id', $subscription['id'])->first();

                if($user) {
                    $checkout = Checkout::where('subscription_id', $subscription['id'])->first();

                    $term = $checkout->type == 'month' ? \Carbon\Carbon::parse($checkout->created_at)->addMonth() : \Carbon\Carbon::parse($checkout->created_at)->addYear();

                    if($term > now()) {
                        $user->allow_till = $term;
                    }

                    $checkout->delete();

                    $user->subscription_id = NULL;

                    $user->save();
                }
            break;
        }

        return response()->json([
            'success' => true
        ]);
    }
}
