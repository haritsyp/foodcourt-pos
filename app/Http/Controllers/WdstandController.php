<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tpstand;
use App\User;
use App\Stand;
use DB;

class WdstandController extends Controller
{
	function index()
	{
		$data = Tpstand::where('tipe', 'withdraw')->get();
		return view('pages.wdstand.index', compact('data'));
	}

	function create(){
		return view('pages.wdstand.create');
	}

	public function store(Request $request) {
		$data = Stand::where('email', $request->email)->get();
		if($data[0]->saldo < $request->saldo){
			return redirect()->back()->with('error', ['Less balance']);   
		}else{	
			DB::insert('insert into tp_stand (id_user, saldo, tanggal, tipe) values (?, ?, now(),"withdraw")', [$data[0]->id,-$request->saldo]);
		}
		return redirect('wdstand');
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
		return redirect('tarik');
	}

	public function destroy($id){
		$data = Tpstand::find($id)->delete();
		if($data){
			return redirect('tarik');
		}

	}
}
