<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 20/04/2015
 * Time: 8:19
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class MenuRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title'             => 'required',
            'slug_menu'         => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required'            => 'Nama Menu Di Perlukan!',
            'slug_menu.required'        => 'Slug Menu Di Perlukan!',
        ];
    }

}