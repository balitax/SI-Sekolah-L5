<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class SettingController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $data['title'] = 'Setting Website';
        $data['data'] = Setting::find(1);
        return view('backend.setting.index', $data);
    }

    public function apiSetting() {
        $data = Setting::OrderBy('id_setting','desc')->get();
        return response()->json($data);
    }

    public function show($id) {
        //
        $data = Setting::find($id);
        return response()->json($data);
    }

    public function edit($id) {
        //
        $data['title'] = 'Edit Kelas';
        $data['data'] = Setting::find($id);
        return view('backend.kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id = 1) {
        //
        $setting    = Setting::find($id);

        $cekinputlogo = Input::file('file');

        if(!empty($cekinputlogo)) {
//            $gbr_lama = DB::table('s_logo_web')->select('logo')->where('id',$id)->first();
            $oldfile            = Setting::where('id_setting',$id)->first();
            File::delete('upload/logo/'.$oldfile->logo);

            $thefile            = Input::file('file');
            $lokasi_simpan      = 'upload/logo';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('file')->move($lokasi_simpan, $filename);

            $setting->logo              = $filename;
        }
        $setting->title_web         = Input::get('title_web');
        $setting->desc_web          = Input::get('desc_web');
        $setting->key_web           = Input::get('key_web');
        $setting->facebook          = Input::get('facebook');
        $setting->twitter           = Input::get('twitter');
        $setting->gplus             = Input::get('gplus');

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
    public function destroy($id) {
        //
        $kelas = Kelas::find($id);
        if ($kelas->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
