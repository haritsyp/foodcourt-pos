<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stand;

class StandController extends Controller
{
    function index()
	{
		$data = Stand::where('tipe', 0)->get();
		return view('pages.stand.index', compact('data'));
	}

	function create(){
		return view('pages.stand.create');
	}

	public function store(Request $request) {
		$data = new Stand();
		$data->name = $request->name;
		$data->email = $request->email;
		$data->password = $request->password;
		$data->tipe = 0;
		$data->pemilik = $request->pemilik;
		$data->telp = $request->telp;
		$data->alamat = $request->alamat;
		$data->save();
		return redirect('stand');
	}

	public function edit($id)
	{
		$data=Stand::find($id);
		return view('pages.stand.edit',compact('data'));
	}

	public function update(Request $request, $id)
	{
		$data = Stand::where('id', $id)->first();
		$data->name = $request->name;
		$data->email = $request->email;
		$data->password = $request->password;
		$data->tipe = 0;
		$data->pemilik = $request->pemilik;
		$data->telp = $request->telp;
		$data->alamat = $request->alamat;
		$data->save();
		return redirect('stand');
	}

	public function destroy($id){
		$data = Stand::find($id)->delete();
		if($data){
			return redirect('stand');
		}

	}
}
