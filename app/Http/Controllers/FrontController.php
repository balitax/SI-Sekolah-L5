<?php

namespace App\Http\Controllers;

use Illuminate\Cookie\CookieJar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        $setting                        = Models\Setting::first();
        $this->data['menu']             = Models\Menu::with('child')->where('level', 0)->get();
        $this->data['berita']           = Models\Berita::orderBy('id_berita', 'desc')->limit(3)->get();
        $this->data['pengumuman']       = Models\Pengumuman::orderBy('tanggal', 'desc')->limit(5)->get();
        $this->data['agenda']           = Models\Agenda::orderBy('tgl_posting', 'desc')->limit(5)->get();
        $this->data['polling']          = Models\Polling::with('jawaban')->where('status', 'Y')->limit(1)->first();
        $this->data['title']            = $setting->title_web;
        $this->data['desc']             = $setting->desc_web;
        $this->data['key']              = $setting->key_web;
        $this->data['logo']             = $setting->logo;
        $this->data['facebook']         = $setting->facebook;
        $this->data['twitter']          = $setting->twitter;
        $this->data['gplus']            = $setting->gplus;
        $this->data['slider_home']      = Models\Berita::orderBy('tanggal', 'desc')->limit(5)->get();
        }

    public function index() {
        //
        return view('web.home', $this->data);
    }

    public function tambahpoll(CookieJar $cookieJar, Request $request) {
        $input = $request->except('_token');
        $update = Models\Jawaban::where('id_soal_poll', $input['id_soal_poll'])->where('jawaban', $input['jawaban'])->first();
        $update->counter = $update->counter + 1;
        $update->update();
        $cookieJar->queue(cookie('polling', 'sudah', 45000));
        return redirect()->to('lihatpoll');
    }

    public function polling() {
        $this->data['polling'] = Models\Polling::with('jawaban')->where('status', 'Y')->first();
        $this->data['total_data'] = $this->data['polling']->jawaban->sum('counter') / 100;
        return view('web.lihat_poll', $this->data);
    }

    public function halaman($slug) {
        $detail_halaman         = Models\Data::where('slug_data',$slug)->first();
        $this->data['page']     = $detail_halaman;
        $this->data['title']    = $detail_halaman->title;
        return view('web.halaman', $this->data);
    }

    public function absensi() {
        $this->data['title'] = 'Absensi';
        return view('web.absensi', $this->data);
    }

    public function showabsensi(Request $request) {
        $input = $request->all();
        $siswa = Models\Absensi::getAbsen($input['kelas'],$input['bulan'],$input['tahun']);
        return response()->json($siswa);
    }

    public function datasiswa() {
        $this->data['title'] = 'Data Siswa';
        return view('web.datasiswa', $this->data);
    }

    public function ambilsiswa($id) {
        $siswa = Models\Siswa::where('id_kelas', $id)->OrderBy('nama_siswa','ASC')->get();
        return response()->json($siswa);
    }

    public function dataguru() {
        $this->data['guru'] = Models\Pegawai::where('status', 'guru')->paginate(15);
        $this->data['title'] = 'Data Guru';
        return view('web.dataguru', $this->data);
    }

    public function datapegawai() {
        $this->data['guru'] = Models\Pegawai::where('status', 'pegawai')->paginate(15);
        $this->data['title'] = 'Data Pegawai';
        return view('web.datapegawai', $this->data);
    }

    public function beritalist() {
        $this->data['title'] = 'Berita Utama';
        $this->data['beritalist'] = Models\Berita::orderBy('id_berita', 'desc')->paginate(6);
        return view('web.berita', $this->data);
    }

    public function berita($slug) {
        $berita_detail              = Models\Berita::where('slug_berita',$slug)->first();
        $this->data['title']        = $berita_detail->judul_berita;
        $this->data['beritalist']   = $berita_detail;
        $this->data['desc']         = substr($berita_detail->isi,0,200).'...';
        $this->data['key']          = $berita_detail->judul_berita;
        return view('web.beritadetail', $this->data);
    }

    public function pengumumanlist() {
        $this->data['title']            = 'Daftar Pengumuman Pengumuman';
        $this->data['pengumumanlist']   = Models\Pengumuman::orderBy('tanggal', 'desc')->paginate(5);
        return view('web.pengumuman', $this->data);
    }

    public function pengumuman($slug) {
        $pengumuman_detail              = Models\Pengumuman::where('slug_pengumuman',$slug)->first();
        $this->data['pengumumanlist']   = $pengumuman_detail;
        $this->data['title']            = $pengumuman_detail->judul_pengumuman;;
        $this->data['desc']             = $pengumuman_detail->judul_pengumuman;
        $this->data['key']              = $pengumuman_detail->judul_pengumuman;
        return view('web.pengumuman_detail', $this->data);
    }

    public function agendalist() {
        $this->data['title'] = 'Daftar Agenda Sekolah';
        $this->data['agendalist'] = Models\Agenda::orderBy('id_agenda', 'desc')->paginate(5);
        return view('web.agenda', $this->data);
    }

    public function agenda($slug) {
        $agenda_detail              =  Models\Agenda::where('slug_agenda',$slug)->first();
        $this->data['title']        = $agenda_detail->tema_agenda;
        $this->data['agendalist']   = $agenda_detail;
        return view('web.agenda_detail', $this->data);
    }

    public function album() {
        $this->data['title'] = 'Album Sekolah';
        $this->data['album'] = Models\Galeri::OrderBy('id_album','desc')->paginate(12);
        return view('web.galeri', $this->data);
    }

    public function foto($id) {
        $this->data['title'] = 'Album Sekolah';
        $album = Models\Foto::where('id_album',$id)->OrderBy('id_foto','desc')->paginate(12);
        $this->data['foto'] = $album;
        return view('web.galeri_detail', $this->data);
    }

    public function download() {
        $this->data['title'] = 'Download File';
        $this->data['download'] = Models\Upload::orderBy('tgl_posting')->paginate(10);
        return view('web.download', $this->data);
    }

}
