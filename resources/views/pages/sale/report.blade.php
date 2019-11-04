@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Sales Report
  </h1>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">

      <table class="table table-bordered" id="dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th class="text-right">Qty</th>
            <th class="text-right">Price (IDR)</th>
            <th class="text-right">Subtotal (IDR)</th>
          </tr>
        </thead>
        <tbody>
          @php
            $harga = 0;
          @endphp
          @foreach($data as $d)
          <tr onclick="location.href='{{url('/paymentview/'.$d->id_penjualan)}}'">
            <td>{{ $d->id_penjualan }}</td>
            <td>{{ $d->nama_menu }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->tanggal_penjualan }}</td>
            <td class="text-right">{{ $d->qty }}</td>
            <td class="text-right">{{ $d->harga }}</td>
            <td class="text-right">{{ number_format($d->qty*$d->harga) }}</td>
            @php
              $harga = $harga+($d->qty*$d->harga);
            @endphp
         </tr>

         @endforeach
         <tr>
           <td colspan="6">Grand Total</td>
           <td class="text-right"><b>{{ number_format($harga) }}</b></td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
</section>

<style type="text/css">
  tr:hover{
    cursor: pointer;
    background-color: grey;
    color:white;
  }
</style>
@stop