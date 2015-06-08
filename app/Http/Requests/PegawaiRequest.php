<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PegawaiRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if(Request::get('id_kepegawaian')){
            $pass = 'min:5';
        } else {
            $pass = 'required_with:username|min:5';
        }
        return [
            'nama_pegawai' => 'required|unique:tbl_kepegawaian,nama_pegawai,'.Request::get('id_kepegawaian').',id_kepegawaian',
            'jk' => 'required',
            'username' => 'required|min:5|max:20|unique:tbl_kepegawaian,username,'.Request::get('id_kepegawaian').',id_kepegawaian',
            'password' => $pass
        ];
    }

    public function messages() {
        return [
            'nama_pegawai.required' => 'Nama Pegawai Diperlukan',
            'nama_pegawai.unique' => 'Nama Pegawai Sudah Terpakai',
            'jk.required' => 'Jenis Kelamin Diperlukan',
            'username.required' => 'Username diperlukan',
            'username.min' => 'Username minimal 5 karakter',
            'username.max' => 'Username max 20 karakter',
            'username.unique' => 'Username sudah terpakai!',
            'password.required_with' => 'Password diperlukan',
            'password.min' => 'Password minimal 5 karakter'
        ];
    }

}
