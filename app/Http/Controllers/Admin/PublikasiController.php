<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publikasi;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Str;
use ZipArchive;


class PublikasiController extends Controller {

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
		$data['title'] = 'Data Publikasi';
        return view('backend.publikasi.index', $data);
	}

	public function apiPublikasi() {
        $data = Publikasi::OrderBy('id','desc')->get();
        return response()->json($data);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['title'] = 'Tambah Data Publikasi';
        return View('backend.publikasi.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pub 						= new Publikasi();
		$pub->judul_publikasi 		= Input::get('judul_publikasi');
		$pub->slug_publikasi 		= Str::slug(Input::get('judul_publikasi'));
		$pub->deskripsi_publikasi	= Input::get('deskripsi_publikasi');

		// Upload File PDF
		$the_pdf            = Input::file('file_pdf');
        $lokasi_simpan1     = 'upload/publikasi';
        $filename_pdf       = 'file-publikasi-'.Str::slug(Input::get('judul_publikasi')).'.'.$the_pdf->getClientOriginalExtension();
        $upload_pdf 	    = Input::file('file_pdf')->move($lokasi_simpan1, $filename_pdf);
        $pub->file_pdf      = $filename_pdf;

        // Upload File Flipbook
        $the_flip            	= Input::file('file_flip');
        $lokasi_simpan2      	= 'publikasi/view/'.Str::slug(Input::get('judul_publikasi'));
        $filename_flip          = Str::slug(Input::get('judul_publikasi')).'.'.$the_flip->getClientOriginalExtension();
        $upload_pdf 	    	= Input::file('file_flip')->move($lokasi_simpan2, $filename_flip);
        $pub->file_flipbook     = $filename_flip;

        // Extract File Zip
        $fileZip  				= $lokasi_simpan2.'/'.$filename_flip;

		$zip = new ZipArchive;     
	    
	    $res = $zip->open($fileZip);
	    if ($res === TRUE) {
		 	$zip->extractTo($lokasi_simpan2);
		 	$zip->close();
		}

		// Hapus Zip Setelah Di Extract
        File::delete($lokasi_simpan2.'/'.$filename_flip);

        if ($pub->save()) {
            return redirect()->to('admin/publikasi')->with('alert','Data berhasil di simpan');
        }
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
		$data['title'] = 'Edit Data Publikasi';
        $data['data'] = Publikasi::find($id);
        return view('backend.publikasi.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $file_pdf 	= Publikasi::where('id',$id)->first();
        File::delete('upload/publikasi/'.$file_pdf->file_pdf);

        $file_flip 	= Publikasi::where('id',$id)->first();
        File::deleteDirectory('publikasi/view/'.$file_flip->slug_publikasi);

        $data = Publikasi::find($id);
        if ($data->delete()) {
            return redirect()->to('admin/publikasi')->with('alert','Data berhasil di hapus');
        }
	}

}
