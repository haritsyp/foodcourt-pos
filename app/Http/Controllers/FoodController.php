<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
   function index()
	{
		$data = Food::where('id_stand', session('id_stand'))->get();
		return view('pages.food.index', compact('data'));
	}

	function create(){
		return view('pages.food.create');
	}

	public function store(Request $request) {
		$data = new Food();
		$data->id_stand = session('id_stand');
		$data->nama_menu = $request->nama_menu;
		$data->harga_menu = $request->harga_menu;
		$data->save();
		return redirect('food');
	}

	public function edit($id)
	{
		$data=Food::find($id);
		return view('pages.food.edit',compact('data'));
	}

	public function update(Request $request, $id)
	{
		echo $id;
		$data = Food::find($id);
		$data->id_stand = session('id_stand');
		$data->nama_menu = $request->nama_menu;
		$data->harga_menu = $request->harga_menu;
		$data->save();
		return redirect('food');
	}

	public function destroy($id){
		$data = Food::find($id)->delete();
		if($data){
			return redirect('food');
		}

	}
}
