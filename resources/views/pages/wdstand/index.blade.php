@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Withdraw Stand
  </h1>
  <a href="{{url('/wdstand/create')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>StandID</th>
            <th class="text-right">Total (IDR)</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr>
            <td>{{ $d->id_saldo }}</td>
            <td>{{ $d->id_user }}</td>
            <td class="text-right">{{ number_format($d->saldo) }}</td>
            <td>{{ $d->tanggal }}</td>
            <td>
             {!! Form::open(['method' => 'DELETE', 'style' => 'display:inline', 'data-toggle' => 'tooltip', 'title' => 'Hapus Data' ,'route'=>['tarik.destroy', $d->id_saldo]]) !!}
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
@stop