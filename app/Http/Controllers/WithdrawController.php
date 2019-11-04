<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topup;
use App\User;
use DB;

class WithdrawController extends Controller
{
    function index()
	{
		$data = Topup::where('tipe', 'withdraw')->get();
		return view('pages.withdraw.index', compact('data'));
	}

	function create(){
		return view('pages.withdraw.create');
	}

	public function store(Request $request) {
		$data = User::where('email', $request->email)->get();
		if($data[0]->saldo < $request->saldo){
			echo 'saldo kurang';
			return redirect()->back()->with('error', ['Less balance']);   
		}else{
			DB::insert('insert into top_up (id_user, saldo, tanggal, tipe) values (?, ?, now(),"withdraw")', [$data[0]['id'] ,-$request->saldo]);
		}
		return redirect('tarik');
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
		$data = Topup::find($id)->delete();
		if($data){
			return redirect('tarik');
		}

	}
}
