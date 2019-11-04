@extends('layouts.template')
@section('content')
<section class="content-header">
   <h1>Add Withdraw Stand</h1>
</section>
<section class="content">
@if (\Session::has('error'))
<div class="alert alert-danger"><strong>Gagal!</strong> Mohon maaf saldo anda tidak mencukupi</div>
@endif
  <div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['url' => 'wdstand','files'=>true, 'class' => 'form-horizontal']) !!}
        @include('pages.topup._form')

        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('tarik')}}" class="btn btn-warning">Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</section>
@endsection