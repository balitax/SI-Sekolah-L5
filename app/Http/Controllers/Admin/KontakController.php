<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Kontak;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class KontakController extends Controller {

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['title'] = 'Pesan Masuk';
        return view('backend.pesan.index', $data);
	}

    public function apiPesan() {
        $data = Kontak::orderBy('id','desc')->get();
        return response()->json($data);
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $data = Kontak::find($id);
        return response()->json($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $data['title']  = 'Lihat Pesan Masuk';
        $data['data']   = Kontak::find($id);
        return view('backend.pesan.view', $data);
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
		//
	}

}
