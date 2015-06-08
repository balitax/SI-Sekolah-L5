<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LinkRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Contracts\Auth\Guard;


class LinkController extends Controller {

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
		//
		$data['title'] = 'Data Link Eksternal';
        return view('backend.link.index', $data);
	}

	public function apiLink() {
        $data = Link::OrderBy('id','desc')->get();
        return response()->json($data);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['title'] = 'Tambah Link EKsternal';
        return View('backend.link.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LinkRequest $request) {
        //
        $input = $request->all();
        $kelas = new Link($input);
        if ($kelas->save()) {
            return response()->json(array('success' => TRUE));
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
		$data = Link::find($id);
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
		$data['title'] = 'Edit Link Eksternal';
        $data['data']  = Link::find($id);
        return view('backend.link.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(LinkRequest $request, $id) 
	{
        $input 	= $request->all();
        $link 	= Link::find($id);
        if ($link->update($input)) {
            return response()->json(array('success' => TRUE));
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
		$link = Link::find($id);
        if ($link->delete()) {
            return response()->json(array('success' => TRUE));
        }
	}

}
