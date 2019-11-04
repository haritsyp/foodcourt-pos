<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Sale;
use App\Food;
use App\Stand;
use App\DetailSale;
use Carbon\Carbon;

class SaleController extends Controller
{
	function index()
	{
		//return \QRCode::text('QR Code Generator for Laravel!')->svg();    
		$data = DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.id_user')
			->select('sales.*', 'users.name')
			->where([['sales.status', '=', 'belum'],
    				['id_stand', '=', session('id_stand')],
					])
            ->get();
		return view('pages.sale.index', compact('data'));
	}

	function report()
	{
		//return \QRCode::text('QR Code Generator for Laravel!')->svg();    
		$data = DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.id_user')
            ->join('sale_details', 'sales.id_penjualan', '=', 'sale_details.id_penjualan')
            ->join('foods', 'foods.id_menu', '=', 'sale_details.id_menu')
			->select('sale_details.*', 'users.name','sales.*','foods.nama_menu')
			->where([
    				['sales.id_stand', '=', session('id_stand')],
					])
            ->get();
		return view('pages.sale.report', compact('data'));
	}

	function reportStand(Request $request)
	{
		//return \QRCode::text('QR Code Generator for Laravel!')->svg();  
		if(isset($request->id)){
			$data = DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.id_user')
            ->join('sale_details', 'sales.id_penjualan', '=', 'sale_details.id_penjualan')
            ->join('foods', 'foods.id_menu', '=', 'sale_details.id_menu')
			->select('sale_details.*', 'users.name','sales.*','foods.nama_menu')
			->where([
    				['sales.id_stand', '=', $request->id],
					])
            ->get();
		} else{
			$data = DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.id_user')
            ->join('sale_details', 'sales.id_penjualan', '=', 'sale_details.id_penjualan')
            ->join('foods', 'foods.id_menu', '=', 'sale_details.id_menu')
			->select('sale_details.*', 'users.name','sales.*','foods.nama_menu')
            ->get();
		}

		$stand = Stand::get();
		
		return view('pages.sale.reports', compact('data','stand'));
	}

	function generateID()
	{
		$id = 'INV-'.Carbon::today()->year;
		$data = Sale::orderBy('id_penjualan', 'DESC')->get();
		if ($data->isNotEmpty()) {
			$datas = substr($data[0]['id_penjualan'],8,12);
			$next = substr('0000000'.($datas+1),-4);
		}else{
			$next = substr('0000001',-4);
		}
		$id = $id.$next;
		return $id;
	}

	function menu(Request $request)
	{
		if($request->id == ''){
			$data = Food::where('id_stand', session('id_stand'))->get();
		}else{
			$data = Food::where([
				['id_stand', '=', session('id_stand')],
				['nama_menu', 'like', '%'.$request->id.'%'],
			])->get();	
		}	
		return response()->json(array('data'=> $data));
	}

	function viewSale(Request $request)
	{
		$data = Sale::where('id_penjualan', $request->id)->get();
		$detail = DB::table('sale_details')
            ->join('foods', 'foods.id_menu', '=', 'sale_details.id_menu')
			->select('sale_details.qty', 'foods.nama_menu', 'sale_details.harga')
			->where('sale_details.id_penjualan', '=', $request->id)
            ->get();
		return view('pages.sale.detaile', compact('data','detail'));
	}

	function viewSales(Request $request)
	{
		$data = Sale::where('id_penjualan', $request->id)->get();
		$detail = DB::table('sale_details')
            ->join('foods', 'foods.id_menu', '=', 'sale_details.id_menu')
			->select('sale_details.qty', 'foods.nama_menu', 'sale_details.harga')
			->where('sale_details.id_penjualan', '=', $request->id)
            ->get();
		return view('pages.sale.details', compact('data','detail'));
	}

	function paymentview(Request $request)
	{
		$data = Sale::where('id_penjualan', $request->id)->get();
		$detail = DB::table('sale_details')
            ->join('foods', 'foods.id_menu', '=', 'sale_details.id_menu')
            ->join('sales', 'sales.id_penjualan', '=', 'sale_details.id_penjualan')
			->select('sale_details.qty', 'foods.nama_menu', 'sale_details.harga','sales.id_user')
			->where('sale_details.id_penjualan', '=', $request->id)
            ->get();
		return view('pages.sale.paymentview', compact('data','detail'));
	}

	function create(){
		$data = Food::where('id_stand', session('id_stand'))->get();
		$id = $this->generateID();
		return view('pages.sale.create', compact('data','id'));
	}

	

	public function store(Request $request) {
		DB::transaction(function () use ($request) {
			$id = $this->generateID();
			DB::insert('insert into sales values (?, ?, now(),?,?,?)', [$id, session('id_stand'),$request->total_penjualan,$request->id_user,'belum']);
			for ($i = 0; $i < count($request->id_menu); $i++)
			{
				DB::insert('insert into sale_details values (?, ?, ?, ?)', [$id, $request->id_menu[$i],$request->qty[$i], $request->harga[$i]]);
			}
		});
		
		return redirect('sale');
	}

	public function edit($id)
	{
		$data=Sale::find($id);
		return view('pages.sale.edit',compact('data'));
	}

	public function update(Request $request, $id)
	{
		$data = Sale::find($id)->first();
		$data->id_stand = session('id_stand');
		$data->nama_menu = $request->nama_menu;
		$data->harga_menu = $request->harga_menu;
		$data->save();
		return redirect('sale');
	}

	public function destroy($id){
		$data = DetailSale::find($id)->delete();
		$data = Sale::find($id)->delete();
		if($data){
			return redirect('sale');
		}

	}
	
}
