<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgendaRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'tema_agenda'   => 'required',
            'isi'           => 'required',
            'tgl_mulai'     => 'required|date',
            'tgl_selesai'   => 'required|date',
            'tempat'        => 'required',
            'jam'           => 'required',
            'keterangan'    => 'required'
        ];
    }

    public function messages() {
        return [
            'tema_agenda.required'      => 'Tema Agenda Diperlukan!',
            'isi.required'              => 'Isi Diperlukan!',
            'tgl_mulai.required'        => 'Tanggal Mulai Diperlukan',
            'tgl_mulai.date'            => 'Tanggal Mulai Format Tanggal tidak benar',
            'tgl_selesai.required'      => 'Tanggal Selesai Diperlukan',
            'tgl_selesai.date'          => 'Tanggal Selesai Format Tanggal tidak benar',
            'tempat.required'           => 'Tempat Diperlukan!',
            'jam.required'              => 'Waktu Diperlukan!',
            'keterangan.required'       => 'Keterangan Diperlukan'
        ];
    }

}
