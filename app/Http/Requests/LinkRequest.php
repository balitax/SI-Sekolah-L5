<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
        return [
            'nama_link' 	=> 'required',
            'url_link' 		=> 'required',
        ];
    }

    public function messages() {
        return [
            'nama_link.required' 	=> 'Judul Link Diperlukan!',
            'url_link.required' 	=> 'Url Link Diperlukan!',
        ];
    }

}
