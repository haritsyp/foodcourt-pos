<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    function index(){
        $date = DB::select("SELECT DATE(A.tanggal_penjualan) AS tgl FROM SALES A JOIN STANDS B ON A.ID_STAND = B.id GROUP BY DATE(A.tanggal_penjualan)");
        $sales = DB::select("SELECT SUM(total_penjualan) as total FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) < YEAR(NOW())");
        $topup = DB::select("SELECT SUM(saldo) as total FROM top_up WHERE YEAR(tanggal) < YEAR(NOW()) and tipe = 'topup'");
        $wd = DB::select("SELECT SUM(saldo) as total FROM top_up WHERE YEAR(tanggal) < YEAR(NOW()) and tipe = 'withdraw'");
        $pay = DB::select("SELECT SUM(total_pembayaran) as total FROM payments WHERE YEAR(tanggal_pembayaran) < YEAR(NOW())");
        $menu = DB::select("SELECT b.nama_menu, sum(a.qty) as total FROM sale_details a join foods b on a.id_menu=b.id_menu group by b.nama_menu order by total desc limit 7");
        
        return view('pages.dashboard.index', compact('date','sales','topup','wd','pay','menu'));
    }

    function getSales(){
        $tahun = DB::select("SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 1
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 2
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 3
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 4
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 5
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 6
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 7
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 8
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 9
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 10
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 11
        UNION ALL
        SELECT IFNULL(SUM(total_penjualan),0) AS TOTAL FROM SALES WHERE YEAR(TANGGAL_PENJUALAN) = YEAR(NOW())-1 AND MONTH(tanggal_penjualan) = 12        ");
        $date = DB::select("SELECT DATE(A.tanggal_penjualan) AS tgl FROM SALES A JOIN STANDS B ON A.ID_STAND = B.id GROUP BY TGL LIMIT 7");
        $sale = DB::select("SELECT SUM(A.total_penjualan) as total FROM SALES A JOIN STANDS B ON A.ID_STAND = B.id GROUP BY DATE(A.tanggal_penjualan) LIMIT 7");
        $sales['date'] = $date;
        $sales['tahun'] = $tahun;
        $sales['sale'] = $sale;
        return response($sales);
    }

    function getSalesPerStand(){
        $sale = DB::select("SELECT B.name,SUM(A.total_penjualan) AS TOTAL FROM SALES A JOIN STANDS B ON A.id_stand = B.id GROUP BY B.name");
        $sales['sale'] = $sale;
        return response($sales);
    }

    function getSalesPerMenu(){
        $sale = DB::select("SELECT b.nama_menu, sum(a.harga*a.qty) as total FROM sale_details a join foods b on a.id_menu=b.id_menu group by b.nama_menu");
        $sales['sale'] = $sale;
        return response($sales);
    }

    function getTopUp(){
        $sale = DB::select("select sum(saldo) as total, date(tanggal) as tgl from top_up where tipe = 'topup' GROUP by date(tanggal)");
        $sales['sale'] = $sale;
        return response($sales);
    }
}
