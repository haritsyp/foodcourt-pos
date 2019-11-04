@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Sales
  </h1>
  <a href="{{url('/sale/create')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">

      <table class="table table-bordered" id="dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID User</th>
            <th>Name</th>
            <th>QRCode</th>
            <th>Date</th>
            <th class="text-right">Total Price (IDR)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr onclick="location.href='{{url('/paymentview/'.$d->id_penjualan)}}'">
            <td>{{ $d->id_penjualan }}</td>
            <td>{{ $d->id_user }}</td>
            <td>{{ $d->name }}</td>
            <td>{!! QrCode::size(70)->generate($d->id_penjualan); !!}</td>
            <td>{{ $d->tanggal_penjualan }}</td>
            <td class="text-right">{{ number_format($d->total_penjualan) }}</td>
            <td>
             {!! Form::open(['method' => 'DELETE', 'style' => 'display:inline', 'data-toggle' => 'tooltip', 'title' => 'Hapus Data' ,'route'=>['sale.destroy', $d->id_penjualan]]) !!}
             {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger btn-xs delete-confirm']) !!}
             {!! Form::close() !!}
           </td>
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
  }
</style>
@stop