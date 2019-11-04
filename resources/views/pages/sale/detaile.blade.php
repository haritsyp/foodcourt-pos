@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Payment Confirm
  </h1>
</section>

<section class="content">
@if (\Session::has('error'))
<div class="alert alert-danger"><strong>Gagal!</strong> Mohon maaf saldo anda tidak mencukupi</div>
@endif
  {!! Form::open(['url' => 'payment','files'=>true]) !!}
  <div class="box box-primary">
    <div class="box-body">
    <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        @foreach($data as $d)
          <b>Invoice #{{ $d->id_penjualan }}</b><br>
          <input type="hidden" name="id_penjualan" value="{{ $d->id_penjualan }}">
          <input type="hidden" name="id_stand" value="{{ $d->id_stand }}">
          <input type="hidden" id="saldo" value="{{ Auth::user()->saldo }}">
          <br>
          <b>Name:</b> {{ Auth::user()->name }}<br>
          <b>Payment Date:</b> {{ $d->tanggal_penjualan }}<br>
        
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th class="text-right">Price</th>
              <th class="text-right">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detail as $de)
            <tr>
              <td>{{ $de->qty }}</td>
              <td>{{ $de->nama_menu }}</td>
              <td class="text-right">{{ number_format($de->harga) }}</td>
              <td class="text-right">{{ number_format($de->harga*$de->qty) }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
         
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Mohon dicek kembali pesanan sembelum mengkonfirmasi pembayaran
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
        
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total (IDR):</th>
                <td class="text-right">{{ number_format($d->total_penjualan) }}</td>
                <input type="hidden" name="total_penjualan" id="total" value="{{ $d->total_penjualan }}">
                @endforeach
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <div class="box-footer">
            {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
        </div>
 </div>
 {!! Form::close() !!}
</section>

@stop
<script type="text/javascript">

</script>