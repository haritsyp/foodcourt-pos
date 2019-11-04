<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topup;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    function index()
	{
		$data = Topup::where('tipe', 'topup')->get();
		return view('pages.topup.index', compact('data'));
	}

	function balance()
	{	
		$user = User::find(Auth::user()->id);
		$data = Topup::where('id_user', Auth::user()->id)->orderBy('tanggal', 'desc')->get();
		return view('pages.balance.index', compact('data','user'));
	}

	function create(){
		return view('pages.topup.create');
	}

	public function store(Request $request) {
		$data = User::where('email', $request->email)->get();	
		DB::insert('insert into top_up (id_user, saldo, tanggal, tipe) values (?, ?, now(),"topup")', [$data[0]['id'] ,$request->saldo]);
		return redirect('topup');
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
		$data = Topup::find($id)->delete();
		if($data){
			return redirect('topup');
		}

	}
}
