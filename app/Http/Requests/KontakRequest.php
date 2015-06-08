<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class KontakRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'nama'          => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'pesan'         => 'required',
            'captcha'       => 'required|captcha',
        ];
    }

    public function messages() {
        return [
            'nama.required'     => ' Masukan Nama Anda!',
            'alamat.required'   => ' Masukan Alamat Anda',
            'email.required'    => ' Masukan Email Anda',
            'pesan.required'    => ' Masukan Pesan Anda',
            'captcha.required'  => ' Masukan Kode Captcha',
        ];
    }

}
