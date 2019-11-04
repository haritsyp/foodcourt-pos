@extends('layouts.template')
@section('content')
<section class="content-header">
 <h1>Add Detail Sales - #{{ $id }}</h1>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">
            {!! Form::open(['url' => 'sale','files'=>true]) !!}
            <div class="box box-primary">
                <div class="box-body">
                <input type="text" class="form-control" name="id_user" placeholder="ID User" required="true"><br>
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Price (IDR)</th>
                        </tr>
                    </thead>
                    <tbody id="cartList">

                    </tbody>
                    <tr>
                     <th colspan="3">Grand Total (IDR)</th>
                     <th class="text-right" width="10px">
                        <span id="total">0</span>
                        <input type="hidden" name="total_penjualan" id="totals" value="0">
                    </th>
                </tr>
            </table>
        </div>
        <div class="box-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('sale')}}" class="btn btn-warning">Back</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-12">
             <div class="form-group row">
                <label for="email" class="col-sm-2">Search Menu </label>

                <div class="col-md-10">
                    <input id="cari" type="text" class="form-control" onkeyup="getMenu()" placeholder="Menu" autofocus>
                </div>
            </div>
        </div>
        <div id="foodList">
            @foreach($data as $d)
            <button onclick="addCart({{ $d->id_menu }},'{{ $d->nama_menu }}',{{ $d->harga_menu }})" class="btn btn-success btn-lg">{{ $d->nama_menu }}</button>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
</section>

@endsection

<style type="text/css">
.btn-lg{
    margin:15px;
}
</style>

<script type="text/javascript">
    var cartList = new Array();
    
    function addCart(id, nama, price){
        var cart = {id:id, nama:nama, qty:'1', price:price};
        if (cartList.length >= 50){
            cartList.shift();
        }
        var check = 0;
        for(var key in cartList){ 
         if(cartList[key].id == id){
            check = 1;
        }
    }
    if(check == 0){
        cartList.push(cart);
        populateDataTable(cartList);
        hitung();
    }else{
        alert("Menu has been entry");
    }

}

function getMenu(){
    var id = $('#cari').val();
    console.log(id);
    var string = '';
    $.ajax({
        type: "GET",
        url: "menu/"+id,
        cache: false,
        success: function(data) {
            jQuery.each(data, function(index, itemData) {
                $.each(itemData, function(index) {
                string = string + "<button onclick='addCart(" + itemData[index].id_menu + ", \" " + itemData[index].nama_menu + " \"," + itemData[index].harga_menu + ")' class='btn btn-success btn-lg'>" + itemData[index].nama_menu + "</button>";
            });
          });
            $("#foodList").html(string);
        } 
    });
}

function hitung(){
    var harga = 0;
    for(var key in cartList){ 
        var qty = parseInt($("#qty"+cartList[key].id).val());
        harga = harga + cartList[key].price*qty; 
        cartList[key].qty = $("#qty"+cartList[key].id).val();
    }
    $("#total").html(thousands_separators(harga));
    $("#totals").val(harga);
}

function thousands_separators(num)
{
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}


function populateDataTable(data) {
    $("#example2").DataTable().clear();
    var length = Object.keys(data).length;
    for(var key in cartList){ 
        $('#example2').dataTable().fnAddData( [
            cartList[key].id + "<input type='hidden' name='id_menu[]' value='"+ cartList[key].id +"'>",
            cartList[key].nama,
            "<div class='col-xs-1' ><input style='width:80px' class='form-control' id='qty"+ cartList[key].id +"' min='1' type='number' name='qty[]' value='"+ cartList[key].qty +"' onchange='hitung()'></div>",
            thousands_separators(cartList[key].price) + "<input type='hidden' name='harga[]' value='"+ cartList[key].price +"'>"
            ]);
    }
    $('#example2 td.numcol').css('text-align', 'right');
}
</script>