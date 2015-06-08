<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BeritaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Input;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

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
        $data['kategori_berita']    = Kategori::all();
        return View('backend.berita.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $berita             = new Berita();
        $berita->tanggal    = date('Y-m-d');
        $berita->waktu      = date('H:i:s');

        $cekinputgbr = Input::file('file');

        if(!empty($cekinputgbr)) {
            $thefile            = Input::file('file');
            $lokasi_simpan      = 'upload/berita';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('file')->move($lokasi_simpan, $filename);

            $berita->gambar     = $filename;
        }
        
        $berita->judul_berita       = Input::get('judul_berita');
        $berita->slug_berita        = Str::slug(Input::get('judul_berita'));
        $berita->kategori_berita    = Input::get('kategori_berita');
        $berita->isi                = Input::get('isi');
        $berita->author             = $this->auth->user()->nama_pegawai;
        $berita->counter            = 1;
        
        if ($berita->save()) {
            return redirect()->to('admin/berita')->with('alert','Data berhasil di simpan');
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
        $data['title']              = 'Edit Berita';
        $data['data']               = Berita::find($id);
        $data['kategori_berita']    = Kategori::all();
        return view('backend.berita.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update() {
        
        $id     = Input::get('id');
        $berita = Berita::find($id);

        $cekinputgbr = Input::file('file');
        if(!empty($cekinputgbr)) {
            $oldfile            = Berita::where('id_berita',$id)->first();
            File::delete('upload/berita/'.$oldfile->logo);

            $thefile            = Input::file('file');
            $lokasi_simpan      = 'upload/berita';
            $filename           = str_random(30).'.'.$thefile->getClientOriginalExtension();
            $upload_gambar      = Input::file('file')->move($lokasi_simpan, $filename);

            $berita->gambar     = $filename;
        }

        $berita->judul_berita       = Input::get('judul_berita');
        $berita->slug_berita        = Str::slug(Input::get('judul_berita'));
        $berita->kategori_berita    = Input::get('kategori_berita');
        $berita->isi                = Input::get('isi');
        $berita->tanggal            = date('Y-m-d');
        $berita->waktu              = date('H:i:s');
        $berita->author             = $this->auth->user()->nama_pegawai;
        $berita->counter            = 1;
        
        if ($berita->save()) {
            return redirect()->to('admin/berita')->with('alert','Data berhasil di simpan');
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
