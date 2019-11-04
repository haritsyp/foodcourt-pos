@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Balance History 
  </h1>
</section>
<section class="content">
  <div class="box">
    <div class="box-body">
     ID : {{ $user->id }}<br>
     Stand Name : {{ $user->name }} <br>
     Balance : Rp. {{ number_format($user->saldo) }}
   </div>
 </div>
  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-bordered table-striped" id="example4">
        <thead>
          <tr>
            <th> Type</th>
            <th class="text-right">Total (IDR)</th>
            <th>Date</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr>
            <td>{{ $d->tipe }}</td>
            <td class="text-right">{{ number_format($d->saldo) }}</td>
            <td>{{ $d->tanggal }}</td>
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