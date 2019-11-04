<div class="form-group {{ $errors->has('nama_menu') ? 'has-error has-feedback' : '' }}">
    {!! Form::label('email', 'Email :', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-3">
        <div class="input-group">
            {!! Form::email('email',null,['class'=>'form-control']) !!}
            {!! $errors->first('email', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error has-feedback' : '' }}">
    {!! Form::label('nominal', 'Nominal (IDR) :', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-3">
        <div class="input-group">
            {!! Form::number('saldo',null,['class'=>'form-control']) !!}
            {!! $errors->first('saldo', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
        </div>
    </div>
</div>

<input type="number" value="{{ Auth::saldo }}">