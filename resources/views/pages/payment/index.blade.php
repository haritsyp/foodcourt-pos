@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Payments History
  </h1>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-bordered" id="example4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th class="text-right">Total (IDR)</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr onclick="location.href='{{url('/viewsales/'.$d->id_penjualan)}}'">
            <td>{{ $d->id_penjualan }}</td>
            <td>{{ $d->tanggal_pembayaran }}</td>
            <td class="text-right">{{ number_format($d->total_pembayaran) }}</td>
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>
 </div>
</section>
<style type="text/css">
  tr:hover{
    cursor: pointer;
    background-color: grey;
    color: white;
  }
</style>
@stop