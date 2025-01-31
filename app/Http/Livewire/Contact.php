<?php

namespace App\Http\Livewire;

use App\Settings\GeneralSettings;
use App\Settings\SMTPSettings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{

    public $success        = null;
    public string $name    = '';
    public string $email   = '';
    public string $message = '';

    public bool $recaptcha      = false;
    public string $siteKey      = '';
    public string $secretKey    = '';

    public function mount(GeneralSettings $generalSettings) {
        $this->recaptcha = $generalSettings->recaptchaEnabled;
        $this->siteKey   = $generalSettings->recaptchaSiteKey;
        $this->secretKey = $generalSettings->recaptchaSecretKey;
    }

    public function submit($data) {
        if( $this->recaptcha ) {
            if($data['g-recaptcha-response']) {
                $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . $this->secretKey . '&response=' . $data['g-recaptcha-response']);

                if($response->status() != 200) {
                    session()->flash('recaptcha-error', true);
                    return redirect('/contact');
                }
            } else {
                session()->flash('recaptcha-error', true);
                return redirect('/contact');
            }
        }

        $this->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required|min:25'
        ]);

        if($this->success === null) {
            try {
                $email = $this->email;

                Mail::send('emails.contact-message', [
                    'name' => $this->name,
                    'email' => $this->email,
                    'messages' => $this->message
                ], function($message) use($email) {
                    $message->to(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Contact on behalf of ' . $email)
                    ->from(config('mail.from.address'), config('mail.from.name'));
                });

                $this->success = true;
            } catch(\Exception $e) {
                $this->success = false;
            }
        }
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
