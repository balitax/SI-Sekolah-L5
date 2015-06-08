<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class HeaderController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['title'] = 'Setting Background Header';
        $data['data'] = Setting::find(1);
        return view('backend.setting.bg_header', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id = 1)
	{
        $setting    = Setting::find($id);

        $cekinput = Input::file('setheader');
        // Header Website
        if(!empty($cekinput)) {
            $oldfile            = Setting::where('id_setting',$id)->first();
            File::delete('upload/logo/'.$oldfile->bg_header);

            $thefile            = Input::file('setheader');
            $lokasi_simpan      = 'upload/logo';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('setheader')->move($lokasi_simpan, $filename);

            $setting->bg_header = $filename;
        }
        if ($setting->save()) {
            return redirect()->back()->with('alert','Data berhasil di simpan');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
