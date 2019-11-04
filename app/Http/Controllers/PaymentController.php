<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Payment;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
	function sale(Request $request)
	{
		$data = Sale::where([
			['id_penjualan', '=', $request->id],
		])->get();		
		return response()->json($data);
	}

	function checkPay(Request $request)
	{
		$data = Sale::where([
			['id_penjualan', '=', $request->id],
			['status','=','bayar'],
		])->get();		
		return response()->json($data);
	}

	function index()
	{
		$data = DB::table('sales')
		->join('payments', 'payments.id_penjualan', '=', 'sales.id_penjualan')
		->select('payments.id_pembayaran', 'payments.id_penjualan','payments.tanggal_pembayaran', 'payments.total_pembayaran')
		->where('sales.id_user', '=', Auth::user()->id)
		->get();
		return view('pages.payment.index', compact('data'));
	}

	function create(){
		return view('pages.payment.create');
	}

	public function store(Request $request) {
		$data = User::find(Auth::user()->id);
		if($data->saldo < $request->total_penjualan){
			return redirect()->back()->with('data', $request);   
		}else{
			$data = new Payment();
			$data->id_penjualan = $request->id_penjualan;
			$data->tanggal_pembayaran = Carbon::now();
			$data->total_pembayaran = $request->total_penjualan;
			$data->save();	
			DB::insert('insert into top_up (id_user, saldo, tanggal, tipe) values (?, ?, now(),"pembayaran")', [Auth::user()->id,-$request->total_penjualan]);
			DB::insert('insert into tp_stand (id_user, saldo, tanggal, tipe) values (?, ?, now(),"pembayaran")', [$request->id_stand,$request->total_penjualan]);
			return redirect('payment');
		}
	}

	public function edit($id)
	{
		$data=Payment::find($id);
		return view('pages.Payment.edit',compact('data'));
	}

	public function update(Request $request, $id)
	{
		$data = Payment::find($id)->first();
		$data->id_stand = session('id_stand');
		$data->nama_menu = $request->nama_menu;
		$data->harga_menu = $request->harga_menu;
		$data->save();
		return redirect('Payment');
	}

	public function destroy($id){
		$data = Payment::find($id)->delete();
		if($data){
			return redirect('Payment');
		}

	}
}
