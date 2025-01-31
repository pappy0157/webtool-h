<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Settings\GeneralSettings;
use App\Settings\SassFeatures;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Base
{
    public function create(SassFeatures $sassFeatures, GeneralSettings $generalSettings) {
        if(!$sassFeatures->status)
            return redirect('/');

        return view('auth.register', [
            'title' => 'Register',
            'description' => 'Create a New Account',
            'keywords' => 'register, sign up',
            'recaptcha'   => $generalSettings->recaptchaEnabled
        ]);
    }

    public function store(SassFeatures $sassFeatures, GeneralSettings $generalSettings, Request $request) {
        if(!$sassFeatures->status)
            return redirect('/');

        $recaptcha = $generalSettings->recaptchaEnabled;

        if($recaptcha) {
            $response = $request->input('g-recaptcha-response');

            if($response) {
                $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . $generalSettings->recaptchaSecretKey . '&response=' . $response);

                if($response->status() != 200) {
                    return redirect()->back()->with('recaptchaerror', TRUE);
                }
            } else {
                return redirect()->back()->with('recaptchaerror', TRUE);
            }
        }

        $fields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);

        event(new Registered($user));

        auth()->login($user, true);

        return redirect('/email/verify')->with('success', true);
    }

    public function verifyNotice() {
        return view('auth.verify', [
            'title' => 'Verification Required',
            'description' => 'You must verify your e-mail to continue.',
            'keywords' => ''
        ]);
    }

    public function verify(EmailVerificationRequest $request, SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        $request->fulfill();
     
        return redirect('/auth/manage')->with('verification', true);
    }

    public function login(SassFeatures $sassFeatures, GeneralSettings $generalSettings) {
        if(!$sassFeatures->status)
            return redirect('/');

        
        return view('auth.login', [
            'title' => 'Login',
            'description' => 'Authorize to the Website',
            'keywords' => 'login, sign in'
        ]);
    }

    public function auth(SassFeatures $sassFeatures, Request $request) {
        if(!$sassFeatures->status)
            return redirect('/');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if( auth()->attempt($request->only('email', 'password'), TRUE) )
            return redirect()->intended('/auth/manage');
        else
            return redirect('/auth/login')->with('notfound', TRUE);
    }

    public function socialLogin(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        Config::set('services.google', [
            'client_id' => $sassFeatures->googleClientId,
            'client_secret' => $sassFeatures->googleClientSecret,
            'redirect' => route('social.login.callback')
        ]);

        return Socialite::driver('google')->redirect();
    }

    public function socialLoginCallback(SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        Config::set('services.google', [
            'client_id' => $sassFeatures->googleClientId,
            'client_secret' => $sassFeatures->googleClientSecret,
            'redirect' => route('social.login.callback')
        ]);

        $user = Socialite::driver('google')->user();

        $siteUser = User::where('email', $user->email)->first();

        if($siteUser) {
            if(!$siteUser->email_verified_at) {
                $siteUser->email_verified_at = now();
                $siteUser->save();
            }

            auth()->login($siteUser, true);

            return redirect()->intended('/auth/manage');
        }

        $siteUser = new User();

        $siteUser->name  = $user->name;
        $siteUser->email = $user->email;
        $siteUser->email_verified_at = now();
        $siteUser->password = 'NONE';

        $siteUser->save();

        auth()->login($siteUser, true);

        return redirect()->intended('/auth/manage');
    }

    public function manage(SassFeatures $sassFeatures, GeneralSettings $generalSettings) {
        if(!$sassFeatures->status)
            return redirect('/');

        
        return view('auth.manage', [
            'title' => 'Manage your Account',
            'description' => 'Change your Subscription status and your Password',
            'keywords' => 'manage, settings'
        ]);
    }

    public function resetPasswordAttempt(SassFeatures $sassFeatures, Request $request) {
        if(!$sassFeatures->status && auth()->user()->password != 'NONE')
            return redirect('/');

        $fields = $request->validate([
            'password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'password_new' => 'required|min:8|confirmed'
        ]);

        if(auth()->user()) {
            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($fields['password_new']);
            $user->save();
        }

        return redirect('/auth/manage#password')->with('resetpassword', TRUE);
    }

    public function resetRequest(SassFeatures $sassFeatures, GeneralSettings $generalSettings, Request $request) {
        if(!$sassFeatures->status)
            return redirect('/');

        if($request->get('token') && $request->get('email')) {
            return view('auth.reset-password', [
                'title' => 'Reset yout Password',
                'description' => 'Choose a new Password',
                'keywords' => 'reset, forgot password',
                'token' => $request->get('token'),
                'email' => $request->get('email')
            ]);
        } else {
            return view('auth.reset-request', [
                'title' => 'Reset Password Request',
                'description' => 'Enter your e-mail to get started.',
                'keywords' => 'reset, forgot password',
                'recaptcha'   => $generalSettings->recaptchaEnabled
            ]);
        }
    }

    public function sendResetEmail(SassFeatures $sassFeatures, GeneralSettings $generalSettings, Request $request) {
        if(!$sassFeatures->status)
            return redirect('/');

        $recaptcha = $generalSettings->recaptchaEnabled;

        if($recaptcha) {
            $response = $request->input('g-recaptcha-response');

            if($response) {
                $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . $generalSettings->recaptchaSecretKey . '&response=' . $response);

                if($response->status() != 200) {
                    return redirect()->back()->with('recaptchaerror', TRUE);
                }
            } else {
                return redirect()->back()->with('recaptchaerror', TRUE);
            }
        }

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->with(['notfound' => true]);
    }

    public function resetWithToken(Request $request, SassFeatures $sassFeatures) {
        if(!$sassFeatures->status)
            return redirect('/');

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('passwordreset', TRUE)
                    : back()->with('error', TRUE);
    }

    public function resendVerification(SassFeatures $sassFeatures, GeneralSettings $generalSettings) {
        if(!$sassFeatures->status)
            return redirect('/');
        
        return view('auth.resend-request', [
            'title' => 'Resend Verification',
            'description' => 'Receive E-mail Verification instructions in your inbox',
            'keywords' => '',
            'recaptcha' => $generalSettings->recaptchaEnabled
        ]);
    }

    public function resendVerificationEmail(SassFeatures $sassFeatures, GeneralSettings $generalSettings, Request $request) {
        if(!$sassFeatures->status)
            return redirect('/');
        
        $recaptcha = $generalSettings->recaptchaEnabled;

        if($recaptcha) {
            $response = $request->input('g-recaptcha-response');

            if($response) {
                $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . $generalSettings->recaptchaSecretKey . '&response=' . $response);

                if($response->status() != 200) {
                    return redirect()->back()->with('recaptchaerror', TRUE);
                }
            } else {
                return redirect()->back()->with('recaptchaerror', TRUE);
            }
        }

        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where(['email' => $request->input('email')])->first();

        if($user) {
            $user->sendEmailVerificationNotification();

            return redirect()->back()->with('success', TRUE);
        } else
            return redirect()->back()->with('error', TRUE);
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
