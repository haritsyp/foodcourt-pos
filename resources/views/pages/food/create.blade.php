@extends('layouts.template')
@section('content')
<section class="content-header">
   <h1>Add Food</h1>
</section>
<section class="content">

  <div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['url' => 'food','files'=>true, 'class' => 'form-horizontal']) !!}
        @include('pages.food._form')

        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('food')}}" class="btn btn-warning">Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</section>
@endsection