<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 24/04/2015
 * Time: 18:13
 */

namespace App\Http\Requests;


class SettingRequest extends Request {

    public function authorize() {
        return TRUE;
    }

    public function rules() {
        return [
            'title_web'         => 'required',
            'desc_web'          => 'required',
            'key_web'           => 'required',
            'facebook'          => 'required',
            'twitter'           => 'required',
            'gplus'             => 'required',
        ];
    }

    public function messages() {
        return [
            'title_web.required'        => 'Judul Website Di Perlukan!',
            'desc_web.required'         => 'Deskripsi Website Di Perlukan!',
            'key_web.required'          => 'Keyword Website Di Perlukan!',
            'facebook.required'         => 'Facebook Website Di Perlukan!',
            'twitter.required'          => 'Twitter Website Di Perlukan!',
            'gplus.required'            => 'Google Plus Website Di Perlukan!',
        ];
    }

}