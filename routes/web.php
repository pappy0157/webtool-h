<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Base;
use App\Http\Controllers\DnsLookupController;
use App\Http\Controllers\InstallerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Settings\SassFeatures;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/stripe-webhook', [ PaymentController::class, 'webhookHandler' ])->name('webhook.handler');

if( File::exists( storage_path('bitflan/installed.stp') ) ) {

    if( File::exists( storage_path( 'bitflan/lock.stp' ) ) ) {

        Route::any('/',      [ InstallerController::class, 'lock' ])->name('lock');
        Route::any('/{any}', [ InstallerController::class, 'lock' ])->name('lock-any');

    } else {

        Route::group(['middleware' => 'guest'], function() {
            Route::get('/auth/login',     [ AuthController::class, 'login'  ])->name('login');
            Route::post('/auth/login',    [ AuthController::class, 'auth'   ])->name('login-store');

            Route::get('/auth/social-login', [ AuthController::class, 'socialLogin'  ])->name('social.login');
            Route::get('/auth/social-login-callback', [ AuthController::class, 'socialLoginCallback'  ])->name('social.login.callback');

            Route::get('/auth/register',  [ AuthController::class, 'create' ])->name('register');
            Route::post('/auth/register', [ AuthController::class, 'store'  ])->name('register-store');

            Route::get('/forgot-password',  [ AuthController::class, 'resetRequest'   ])->middleware('guest')->name('password.reset');
            Route::post('/forgot-password', [ AuthController::class, 'sendResetEmail' ])->middleware('guest')->name('password.email');
            Route::post('/reset-password',  [ AuthController::class, 'resetWithToken' ])->middleware('guest')->name('password.token');

            Route::get('/email/resend-verification',        [ AuthController::class, 'resendVerification'      ])->name('resend.verification');
            Route::post('/email/verification-notification', [ AuthController::class, 'resendVerificationEmail' ])->middleware(['throttle:6,1'])->name('verification.notification');
        });

        Route::group(['middleware' => 'auth'], function() {

            Route::get('/email/verify',             [ AuthController::class, 'verifyNotice' ])->name('verification.notice');
            Route::get('/email/verify/{id}/{hash}', [ AuthController::class, 'verify'       ])->name('verification.verify')->middleware(['signed']);

            Route::any('/auth/logout',              [ AuthController::class, 'logout'               ])->name('logout');

            Route::group(['middleware' => 'verified'], function() {

                Route::get('/auth/manage',          [ AuthController::class, 'manage'               ])->name('manage');

                Route::post('/auth/password-reset', [ AuthController::class, 'resetPasswordAttempt' ])->name('manage-reset-password');

                Route::get('/payments/monthly',             [ PaymentController::class, 'monthly'  ])->name('monthly.subscription');
                Route::get('/payments/yearly',              [ PaymentController::class, 'annually' ])->name('yearly.subscription');

                Route::get('/payments/success',             [ PaymentController::class, 'success' ])->name('success.subscription');
                Route::get('/payments/cancel',              [ PaymentController::class, 'cancel'  ])->name('cancel.subscription');
                Route::get('/payments/cancel-subscription', [ PaymentController::class, 'delete'  ])->name('cancel.current.subscription');
                Route::get('/payments/cancel-confirmation', [ PaymentController::class, 'cancelConfirmation' ])->name('cancel.current.subscription.confirmation');
                Route::get('/payments/already-subscribed',  [ PaymentController::class, 'alreadySubscribed'  ])->name('already.subscribed');

            });

        });

        Route::get('/cookie-consent',   [ Base::class, 'markCookieConsent' ])->name('mark-cookie-consent');

        Route::get('/pricing',          [ PaymentController::class, 'pricing' ])->name('pricing');
        Route::get('/dnsLookup',        [ DnsLookupController::class, 'dnsLookup' ])->name('dnsLookup');

        Route::get('/',                 [ MainController::class, 'index'    ] )->name('homepage');

        Route::get('/blog',             [ MainController::class, 'blog'     ] )->name('blog');
        Route::get('/blog/{post}',      [ MainController::class, 'blogPost' ] )->name('blog-post');

        Route::get('/page/{page}',      [ MainController::class, 'page'     ] )->name('page');
        Route::get('/contact',          [ MainController::class, 'contact'  ] )->name('contact');
        Route::any('/tool/{slug}',      [ MainController::class, 'tool'     ] )->name('tool');
        Route::get('/language/{code}',  [ MainController::class, 'language' ] )->name('set-language');
        Route::get('/theme/{theme}',    [ MainController::class, 'theme'    ] )->name('set-theme');

        Route::get('/download-thumb/{id}', [ MainController::class, 'downloadYoutubeThumb' ])->name('download-file');
        Route::get('/download-qr/{query}', [ MainController::class, 'downloadQrCode' ])->name('download-file');

        if(!function_exists('symlink')) {

            Route::get('/storage/{file}', function(Response $response, $file) {
                return $response->file(storage_path('app/public/' . $file));
            });

        }
    }

} else {
    Route::get('/', function() {
        return redirect(route('installer'));
    });

    Route::get('/install', [ InstallerController::class, 'index' ])->name('installer');
}
