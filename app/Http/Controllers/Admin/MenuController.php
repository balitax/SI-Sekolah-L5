<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 19/04/2015
 * Time: 20:13
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Auth\Guard;

class MenuController extends Controller {

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function index() {
        $data['title'] = 'Menu Website';
        return view('backend.menu.index', $data);
    }

    public function apiDataMenu() {
        $data = Menu::orderBy('id','desc')->get();
        return response()->json($data);
    }

    public function create() {
        //
        $data['title'] = 'Tambah Data Menu';
        return View('backend.menu.create', $data);
    }

    public function store(MenuRequest $request) {
        $input = $request->all();
        $data = new Menu($input);
        if ($data->save()) {
            return response()->json(array('success' => TRUE));
        }
    }

    public function show($id) {
        //
        $data = Menu::find($id);
        return response()->json($data);
    }

    public function edit($id) {
        //
        $data['title']  = 'Edit Menu Website';
        $data['data']   = Menu::find($id);
        return view('backend.menu.edit', $data);
    }

    public function update(MenuRequest $request, $id) {
        //
        $input      = $request->all();
        $menu       = Menu::find($id);
        if ($menu->update($input)) {
            return response()->json(array('success' => TRUE));
        }
    }

    public function destroy($id) {
        //
        $data = Menu::find($id);
        if ($data->delete()) {
            return response()->json(array('success' => TRUE, 'msg' => 'Data Berhasil Dihapus'));
        }
    }

}