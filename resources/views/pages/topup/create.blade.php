@extends('layouts.template')
@section('content')
<section class="content-header">
   <h1>Add Topup</h1>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['url' => 'topup','files'=>true, 'class' => 'form-horizontal']) !!}
        @include('pages.topup._form')

        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('topup')}}" class="btn btn-warning">Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</section>
@endsection