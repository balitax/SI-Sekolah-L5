<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 18/05/2015
 * Time: 19:41
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Kategori;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class KategoriController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function index() {
        $data['title'] = 'Kategori Berita Website';
        return view('backend.kategori.index', $data);
    }

    public function apiDataKategori() {
        $data = Kategori::orderBy('id','desc')->get();
        return response()->json($data);
    }

    public function show($id) {
        $data = Kategori::find($id);
        return response()->json($data);
    }

    public function create() {
        //
        $data['title'] = 'Tambah Kategori Berita';
        return View('backend.kategori.create', $data);
    }

    public function store(KategoriRequest $request) {
        $input                  = $request->all();
        $data                   = new Kategori($input);
        $data->slug_kategori    = Str::slug($request->nama_kategori);
        if ($data->save()) {
            return response()->json(array('success' => TRUE));
        }
    }

    public function edit($id) {
        //
        $data['title']  = 'Edit Kategori Berita Website';
        $data['data']   = Kategori::find($id);
        return view('backend.kategori.edit', $data);
    }

    public function update($id) {
        $nama_kategori          = Input::get('nama_kategori');
        $kat                    = Kategori::find($id);
        $kat->nama_kategori     = $nama_kategori;
        $kat->slug_kategori    = Str::slug($nama_kategori);
        if ($kat->save()) {
            return response()->json(array('success' => TRUE));
        }
    }

    public function destroy($id) {
        //
        $data = Kategori::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}