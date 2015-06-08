<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GaleriRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class GaleriController extends Controller {

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
        $data['title'] = 'Data Galeri';
        return view('backend.galeri.index', $data);
    }

    public function apiGaleri() {
        $data = Galeri::orderBy('id_album', 'desc')->get();
        return response()->json($data);
    }

    public function apiCreateGaleri() {
        $data = Galeri::DropdownGaleri();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Galeri';
        return View('backend.galeri.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(GaleriRequest $request) {

        $input = $request->all();
        $galeri = new Galeri($input);

        $cekcover = Input::file('cover_album');
        if(!empty($cekcover)) {
            $thefile            = Input::file('cover_album');
            $lokasi_simpan      = 'upload/album';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('cover_album')->move($lokasi_simpan, $filename);

            $galeri->cover_album      = $filename;
        }
        if ($galeri->save()) {
            return redirect()->to('admin/galeri');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        $data = Galeri::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $data['title'] = 'Edit Galeri';
        $data['data'] = Galeri::find($id);
        return view('backend.galeri.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update() {
        $id                         = Input::get('id');
        $galeri                     = Galeri::find($id);
        $cekcover                   = Input::file('cover_album');
        $galeri->nama_album         = Input::get('nama_album');

        if(!empty($cekcover)) {

            $oldfile            = Galeri::where('id_album',$id)->first();
            File::delete('upload/album/'.$oldfile->cover_album);

            $thefile            = Input::file('cover_album');
            $lokasi_simpan      = 'upload/album';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('cover_album')->move($lokasi_simpan, $filename);

            $galeri->cover_album      = $filename;
        }
        if ($galeri->save()) {
            return redirect()->to('admin/galeri');
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
        $galeri = Galeri::find($id);
        if ($galeri->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

}
