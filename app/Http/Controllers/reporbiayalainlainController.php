<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class reporbiayalainlainController extends Controller
{
    public function Reportselect()
{
    $sessiondata = Session()->get('login');
    $id = $sessiondata['kode_perusahaan'];
    $sum= DB::select("select SUM(db.harga_biaya_lainlain) as a from biaya_lainlain db where db.kode_biaya_lainlain like '$id%' and cek_status_biaya_lainlain=1 ");
    $param['kodeperus']= $id;
    $param['sum']=number_format($sum[0]->a);


    $sessiondata = Session()->get('login');
    $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
   

   

    $query = DB::table('biaya_lainlain')
        ->where('cek_status_biaya_lainlain', 1)
        ->where('kode_biaya_lainlain', 'like', "$kodeidpegawaiperus%");



    $data = $query->orderBy('created_at', 'desc')->paginate(5);


    $jumlahbiayaopnonbudget= DB::select("select SUM(db.harga_biaya_pribadi) as a from biaya_pribadi db where db.kode_biaya_pribadi like '$id%' and cek_status_biaya_pribadi=1 AND cek_approval_biaya_pribadi = 0");



    $param['kodeperus']= $id;
    $param['sum']=number_format($sum[0]->a);
    $param['nonbudget']=number_format($jumlahbiayaopnonbudget[0]->a);

    $nilai1 = $sum[0]->a;
    $nilai2 = $jumlahbiayaopnonbudget[0]->a; 
    
   
    $param['totalsemua'] = $nilai1 + $nilai2;
    

    $param['totalsemua'] = number_format($param['totalsemua'], 2);
    $query2 = DB::table('biaya_pribadi')
    ->where('cek_status_biaya_pribadi', 1)
    ->where('cek_approval_biaya_pribadi', 0)
    ->where('kode_biaya_pribadi', 'like', "$kodeidpegawaiperus%");




$data2= $query2->orderBy('created_at', 'desc')->paginate(5);

     return view("report.reportbiayalainlain",$param,compact('data','data2'));
    }
    
    public function generatePDF()
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];

        // Mengambil total harga biaya lain-lain
        $sum = DB::select("SELECT SUM(db.harga_biaya_lainlain) as a FROM biaya_lainlain db WHERE db.kode_biaya_lainlain LIKE '$id%' AND cek_status_biaya_lainlain=1");
        $param['kodeperus'] = $id;
        $param['sum'] = number_format($sum[0]->a);

        // Query untuk menampilkan data biaya lain-lain
        $query = DB::table('biaya_lainlain')
            ->where('cek_status_biaya_lainlain', 1)
            ->where('kode_biaya_lainlain', 'like', "$id%");

        // Ambil data dengan paginasi
        $data = $query->orderBy('created_at', 'desc')->paginate(5);

        // Menghitung biaya non-budgeting dari biaya pribadi
        $jumlahbiayaopnonbudget = DB::select("SELECT SUM(db.harga_biaya_pribadi) as a FROM biaya_pribadi db WHERE db.kode_biaya_pribadi LIKE '$id%' AND cek_status_biaya_pribadi=1 AND cek_approval_biaya_pribadi = 0");
        
        $param['nonbudget'] = number_format($jumlahbiayaopnonbudget[0]->a);

        $nilai1 = $sum[0]->a; 
        $nilai2 = $jumlahbiayaopnonbudget[0]->a; 

        // Jumlahkan kedua nilai
        $param['totalsemua'] = number_format($nilai1 + $nilai2, 2);

        // Query untuk biaya pribadi yang belum di-approval
        $query2 = DB::table('biaya_pribadi')
            ->where('cek_status_biaya_pribadi', 1)
            ->where('cek_approval_biaya_pribadi', 0)
            ->where('kode_biaya_pribadi', 'like', "$id%");

        // Ambil data dengan paginasi
        $data2 = $query2->orderBy('created_at', 'desc')->paginate(5);

        // Load view untuk PDF
        $pdf = PDF::loadView('printreport.reportbiayalainlain', $param, compact('data', 'data2'))
            ->setPaper('a4', 'landscape'); // Mengatur ukuran kertas ke A4 dan orientasi landscape

        // Mengembalikan file PDF
        return $pdf->download('laporan-biaya-lainlain.pdf');
    }
    
}
