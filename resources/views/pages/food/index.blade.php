@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Food 
  </h1>
  <a href="{{url('/food/create')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Food Name</th>
            <th>Price (IDR)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr>
            <td>{{ $d->id_menu }}</td>
            <td>{{ $d->nama_menu }}</td>
            <td>{{ $d->harga_menu }}</td>
            <td>
             <a href="{{route('food.edit',$d->id_menu)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Ubah Data">
               <span class="glyphicon glyphicon-pencil"></span>
             </a>
             {!! Form::open(['method' => 'DELETE', 'style' => 'display:inline', 'data-toggle' => 'tooltip', 'title' => 'Hapus Data' ,'route'=>['food.destroy', $d->id_menu]]) !!}
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