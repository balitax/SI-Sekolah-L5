<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 18/05/2015
 * Time: 19:55
 */


namespace App\Http\Requests;
use App\Http\Requests\Request;

class KategoriRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nama_kategori'             => 'required',
        ];
    }

    public function messages() {
        return [
            'nama_kategori.required'            => 'Nama Kategori Di Perlukan!',
        ];
    }

}