<?php

namespace SquadMS\Contact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class SendContactMessage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* Anyone should be able to send contact messages */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'              => 'required|string|min:3',
            'steam_profile_url' => 'required|url|steam_profile_url',
            'email'             => 'required|email',
            'subject'           => 'required|string|min:3',
            'message'           => 'required|string|min:10',
        ];

        if (Config::get('app.env') == 'production') {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }
}
