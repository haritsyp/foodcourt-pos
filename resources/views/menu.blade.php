@extends('layouts.template')
<style type="text/css">
.background{
	height:150px;
	background-color: #367fa9;
	border-bottom-right-radius: 50px;
	border-bottom-left-radius: 50px;
	position: fixed;
}
.wew{
	width: 40%;
	background-color: white;
	margin:5%;
	float: left;
	height: 150px;
	border-radius: 15px;
	left: 50%;
    z-index: 5;
    -webkit-box-shadow: 0px 1px 2px #000000;
       -moz-box-shadow: 0px 1px 2px #000000;
            box-shadow: 0px 1px 2px #000000;
}
.container{
	padding-top: 100px;
}
.im{
	margin-top: 40px;
	margin-left: 34%
}
.title{
	text-align: center;
	vertical-align: center;

}
.text-center{
	margin-top: 5px;
	font-size: 18px;
	font-weight: 500;
}
.wes{
	color:white;
	text-align: center;
	padding-top: 50px;
	font-size: 30px;
	font-weight: 800;
}
</style>
@section('content')

<div class="row">
	<div class="col-md-12 background">
		<div class="col-md-12 wes">
			Welcome to I-Foodcourt
		</div>
		<div class="container">
			<div class="wew" onclick="location.href='harits://qrcode'">
				<img class="im" height="50px" src="{{ asset('qr-code.svg') }}">
				<div class="text-center">Scan QRCode</div>
			</div>
			<div class="wew" onclick="location.href='harits://trans'">
				<img class="im" height="50px" src="{{ asset('account.svg') }}">
				<div class="text-center">Transaction History</div>
			</div>
			<div class="wew" onclick="location.href='harits://balance'">
				<img class="im" height="50px" src="{{ asset('wallet.svg') }}">
				<div class="text-center">Balance</div>
			</div>
			<div class="wew"onclick="location.href='harits://logout'" >
				<img class="im" height="50px" src="{{ asset('logout.svg') }}">
				<div class="text-center">Logout</div>
			</div>
		</div>
	</div>
</div>





@endsection