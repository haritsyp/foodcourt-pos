<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tpstand;
use App\Stand;

class TpstandController extends Controller
{
    function index()
	{
		$user = Stand::find(session('id_stand'));
		$data = Tpstand::where('id_user', session('id_stand'))->orderBy('tanggal', 'desc')->get();
		return view('pages.tpstand.index', compact('data','user'));
	}

	function create(){
		return view('pages.tpstand.create');
	}

	public function store(Request $request) {
		$data = User::where('email', $request->email)->get();	
		DB::insert('insert into top_up (id_user, saldo, tanggal, tipe) values (?, ?, now(),"tpstand")', [$data[0]['id'] ,$request->saldo]);
		return redirect('tpstand');
	}

	public function edit($id)
	{
		$data=Food::find($id);
		return view('pages.food.edit',compact('data'));
	}

	public function update(Request $request, $id)
	{
		$data = Food::find($id)->first();
		$data->id_stand = session('id_stand');
		$data->nama_menu = $request->nama_menu;
		$data->harga_menu = $request->harga_menu;
		$data->save();
		return redirect('food');
	}

	public function destroy($id){
		$data = Tpstand::find($id)->delete();
		if($data){
			return redirect('tpstand');
		}

	}
}
