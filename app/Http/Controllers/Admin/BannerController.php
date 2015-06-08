<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;


class BannerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function index() {
        //
        $data['title'] 		= 'Upload Banner';
        $data['banner']		= Banner::first();
        if ($this->auth->user()->status == 'admin') {
            return view('backend.banner.index', $data);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

    	$banner 		= Banner::find(1);
        $cekinputgbr 	= Input::file('file');

        if(!empty($cekinputgbr)) {
        	
        	$oldfile            = Banner::where('id',1)->first();
            File::delete('upload/banner/'.$oldfile->gambar);

            $thefile            = Input::file('file');
            $lokasi_simpan      = 'upload/banner';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('file')->move($lokasi_simpan, $filename);

            $banner->gambar     = $filename;
        }

        $banner->url 			= Input::get('url_banner');
        $banner->aktif 			= Input::get('status');
        
        if ($banner->save()) {
            return redirect()->to('admin/banner')->with('alert','Data berhasil di simpan');
        }
    }
}
