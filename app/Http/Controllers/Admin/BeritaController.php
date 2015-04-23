<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BeritaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaController extends Controller {

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
        $data['title'] = 'Menu Berita';
        return view('backend.berita.index', $data);
    }

    public function apiBerita() {
        $data = Berita::orderBy('id_berita', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $data['title'] = 'Tambah Berita';
        return View('backend.berita.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(BeritaRequest $request) {
        $destinationPath = public_path('upload/berita');
        $data = $request->except('file');
        if ($request->has('data')) {
            $data = json_decode($request->get('data'));
        }
        if (isset($data->id_berita)) {
            $berita = Berita::find($data->id_berita);
            if ($request->hasFile('file')) {
                $checkfile = file_exists($destinationPath . '/' . $berita->gambar);
                if ($checkfile) {
                    unlink($destinationPath . '/' . $berita->gambar);
                }
                $berita->gambar = Str::random(30).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $berita->gambar);
            }
        } else {
            $berita = new Berita();
            $berita->tanggal = date('Y-m-d');
            $berita->waktu = date('H:i:s');
            if ($request->hasFile('file')) {
                $berita->gambar = Str::random(30).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $berita->gambar);
            }
        }
        $berita->judul_berita   = $data->judul_berita;
        $berita->slug_berita    = Str::slug($data->judul_berita);
        $berita->isi            = $data->isi;
        $berita->author         = $this->auth->user()->nama_pegawai;
        if ($berita->save()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Di Simpan'));
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        $data = Berita::find($id);
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
        $data['title'] = 'Edit Berita';
        $data['data'] = Berita::find($id);
        return view('backend.berita.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(BeritaRequest $request, $id) {
        //
        $input = $request->all();
        $input['author'] = $this->auth->user()->nama_pegawai;
        $berita = Berita::find($id);
        $berita->slug_berita    = Str::slug($request->judul_berita);
        if ($berita->update($request->all())) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        // File Delete By Agus Cahyono
        $file_lama = DB::table('tbl_berita')->select('gambar')->where('id_berita',$id)->first();
        File::delete('upload/berita/'.$file_lama->gambar);

        $data = Berita::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}
