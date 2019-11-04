@extends('layouts.template')
@section('content')
<section class="content-header">
   <h1>Update Data Stand</h1>
</section>
<section class="content">
    
    {!! Form::model($data,['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'route'=>['stand.update',$data->id]]) !!}
    
    @include('pages.stand._form')
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-6">
        	{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        	<a href="{{ url('stand')}}" class="btn btn-warning">Back</a>
    	</div>
    </div>
    {!! Form::close() !!}
@endsection