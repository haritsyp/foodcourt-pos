@extends('layouts.template')
@section('content')
<section class="content-header">
  <h1>
    Dashboard
  </h1>
</section>
<section class="content">
    <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Penjualan Harian</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Penjualan Harian : {{ $date[0]->tgl }} s/d {{ $date[count($date)-1]->tgl }}</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 300px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>

                <!-- /.col -->
              </div>
              <!-- /.row -->
            <!-- ./box-body -->
   </div>
 </div>

 <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Tahun Lalu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Periode Desember {{ date("Y",strtotime("-1 year")) }}</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart2" style="height: 220px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Rekap Tahun Lalu</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Total Penjualan</span>
                    <span class="progress-number"><b>Rp. {{ number_format($sales[0]->total) }}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                  <span class="progress-text">Total Top Up</span>
                    <span class="progress-number"><b>Rp.  {{ number_format($topup[0]->total) }}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                  <span class="progress-text">Total Withdraw Customer</span>
                    <span class="progress-number"><b>Rp. {{ number_format($wd[0]->total) }}</span>


                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                  <span class="progress-text">Total Payment</span>
                    <span class="progress-number"><b>Rp. {{ number_format($pay[0]->total) }}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            <!-- ./box-body -->

   </div>
 </div>

 <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Penjualan Per Stand</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Periode {{ date("M") }} {{ date("Y")}}</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart3" style="height: 220px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
</div>
              <!-- /.row -->
            <!-- ./box-body -->

   </div>
 </div>


 <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Penjualan Per Menu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Periode {{ date("M") }} {{ date("Y")}}</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart4" style="height: 350px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Penjualan Per Menu</strong>
                  </p>

                  <table class="table table-bordered table-striped" id="dataTable">
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Jumlah Terjual</th>
                    </tr>
                    @foreach($menu as $key => $m)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $m->nama_menu }}</td>
                        <td>{{ $m->total }}</td>
                      </tr>
                    @endforeach
                  </table>
                </div>


                <!-- /.col -->
              </div>
              <!-- /.row -->
            <!-- ./box-body -->

   </div>
 </div>

 <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Top Up Customer</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Periode {{ date("M") }} {{ date("Y")}}</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart5" style="height: 220px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
</div>
              <!-- /.row -->
            <!-- ./box-body -->

   </div>
 </div>
</section>
<style type="text/css">
  tr:hover{
    cursor: pointer;
    background-color: grey;
    color: white;
  }
</style>
@stop
