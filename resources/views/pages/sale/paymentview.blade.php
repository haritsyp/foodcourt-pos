@extends('layouts.template')
@section('content')
<script type="text/javascript">

  function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        
        var id = $("#id").val();
        $.ajax({
        type: "GET",
        url: "checkPay/"+id,
        cache: false,
        success: function(data) {
            jQuery.each(data, function(index, itemData) {
              alert('Payment Success');
                $.each(itemData, function(index) {
                //console.log(itemData.id_penjualan);
                  
                  window.location = "{{url('sale')}}";  
            });
          });

        } 
    });

        }
 
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 1000);
</script>
<section class="content-header">
  <h1>
    Payment Detail
  </h1>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-12 invoice-col">
        @foreach($data as $d)
          <b>Invoice #{{ $d->id_penjualan }}</b>
          <input type="hidden" name="id_penjualan" id="id" value="{{ $d->id_penjualan }}">
          <br>
          <b>ID User:</b> {{ $d->id_user }}<br>
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
         
          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
        
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total (IDR):</th>
                <td class="text-right">{{ number_format($d->total_penjualan) }}</td>
                <input type="hidden" name="total_penjualan" value="{{ $d->total_penjualan }}">
                
              </tr>
            </table>
          </div>
        </div>
        </div>

      </div>
    <div class="col-md-6">
      <center>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           {!! QrCode::size(180)->generate($d->id_penjualan); !!}
      </p>
    </center>
      <img width="1000px" src="">
    
        </div>
        @endforeach
        <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
 </div>
</section>
@stop

