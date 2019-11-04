<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>I-FoodCourt POS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<style type="text/css">
  body{
    font-size: 18px;
  }
</style>
</head>


<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="{{ url('login') }}" class="logo">
        <span class="logo-mini"><b>I</b>-FC</span>
        <span style="margin-left:0" class="logo-lg text-left" data-toggle="push-menu" role="button"><b>
          <img style="padding-bottom: 5px;" height="20" src="{{ asset('icon.jpg') }}">
         I-Foodcourt</b>
        @if (session('id_stand') == null)
          <i onclick="location.href='harits://qrcode'"class="text-right" style="float:right;margin-top: 3px"><img width="20px" src="{{ asset('qr-code-16.png') }}"></i>
        @endif
        </span>
      </a>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            @if (session('id_stand') !== null)
              {{ session('nama_stand') }}
            @else
              {{ Auth::user()->name }}
            @endif
          </p>
            @if (session('id_stand') !== null)
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            @else
            <a href="#">ID:{{ Auth::user()->id }}</a>
            @endif
          
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if (session('id_stand') !== null)
          @if(session('tipe') == 1)
        <li><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
        <li><a href="{{ url('stand')}}"><i class="fa fa-th"></i><span> Stand</span></a></li>
        <li><a href="{{ url('topup')}}"><i class="fa fa-th"></i><span> Topup</span></a></li>
        <li><a href="{{ url('tarik')}}"><i class="fa fa-th"></i><span> Withdraw</span></a></li>
        <li><a href="{{ url('wdstand')}}"><i class="fa fa-th"></i><span> Withdraw Stand</span></a></li>
        <li><a href="{{ url('admin/report')}}"><i class="fa fa-file"></i><span> Sales Report</span></a></li>     
          @else
        <li><a href="{{ url('food')}}"><i class="fa fa-cutlery"></i><span> Food</span></a></li>
        <li><a href="{{ url('sale')}}"><i class="fa fa-shopping-cart"></i><span> Sales</span></a></li>
        <li><a href="{{ url('tpstand')}}"><i class="fa fa-money"></i><span> Balance</span></a></li>
        <li><a href="{{ url('sales/report')}}"><i class="fa fa-file"></i><span> Sales Report</span></a></li>       
          @endif
        @else
        <li><a href="{{ url('menu')}}"><i class="fa fa-th"></i><span> Home</span></a></li> 
        <li><a href="{{ url('payment')}}"><i class="fa fa-th"></i><span> Transaction History</span></a></li> 
        <li><a href="{{ url('balance')}}"><i class="fa fa-th"></i><span> Balance History</span></a></li>      
        @endif
        
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>    

<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    @yield('content')
  </div>
  @if (session('id_stand') !== null)
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">I-Foodcourt</a>.</strong> All rights
    reserved.
  </footer>
  @endif
  <div class="control-sidebar-bg"></div>
</div>

<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script>
  $(function () {
    $('#dataTable').DataTable()
    $("#example3").DataTable()
    $('#example2').DataTable( {
      columnDefs: [
      {
        targets: 3,
        className: 'text-right'
        
      }
      ]
    } );
    $('#example4').DataTable( {
      "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "searching":false
    } );
  })
</script>
</body>
</html>
