@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Stand 
  </h1>
  <a href="{{url('/stand/create')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a>
</section>

<section class="content">

  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Stand Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->email }}</td>
            <td>**************</td>
            <td>
             <a href="{{route('stand.edit',$d->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Ubah Data">
               <span class="glyphicon glyphicon-pencil"></span>
             </a>
             {!! Form::open(['method' => 'DELETE', 'style' => 'display:inline', 'data-toggle' => 'tooltip', 'title' => 'Hapus Data' ,'route'=>['stand.destroy', $d->id]]) !!}
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