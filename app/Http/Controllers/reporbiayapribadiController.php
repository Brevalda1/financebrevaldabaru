<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class reporbiayapribadiController extends Controller
{
    public function Reportselect()
{
    $sessiondata = Session()->get('login');
    $id = $sessiondata['kode_perusahaan'];
    $sum= DB::select("select SUM(db.harga_biaya_pribadi) as a from biaya_pribadi db where db.kode_biaya_pribadi like '$id%' and cek_status_biaya_pribadi=1 AND cek_approval_biaya_pribadi = 1");
    $param['kodeperus']= $id;
    $param['sum']=number_format($sum[0]->a);
 
    // untuk menampilkan data

    $sessiondata = Session()->get('login');
    $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
   

   
    // Mulai query
    $query = DB::table('biaya_pribadi')
        ->where('cek_status_biaya_pribadi', 1)
        ->where('cek_approval_biaya_pribadi', 1)
        ->where('kode_biaya_pribadi', 'like', "$kodeidpegawaiperus%");

    // Tambahkan pencarian jika ada

    // Ambil data dengan paginasi
    $data = $query->orderBy('created_at', 'desc')->paginate(5);

    // return view('pegawai.index', compact('data', 'search', 'kodeidpegawai'));
    // return view("gajipegawai.showgajipegawai",compact('data', 'search', 'kodeidpegawai'));

    //pencatatan masa depan 
    $jumlahbiayaopnonbudget= DB::select("select SUM(db.harga_biaya_pribadi) as a from biaya_pribadi db where db.kode_biaya_pribadi like '$id%' and cek_status_biaya_pribadi=1 AND cek_approval_biaya_pribadi = 0");


    // $param['budget']=number_format($budget[0]->b);
    $param['kodeperus']= $id;
    $param['sum']=number_format($sum[0]->a);
    $param['nonbudget']=number_format($jumlahbiayaopnonbudget[0]->a);

    $nilai1 = $sum[0]->a; // Ambil nilai dari hasil query
    $nilai2 = $jumlahbiayaopnonbudget[0]->a; // Ambil nilai dari hasil query
    
    // Jumlahkan kedua nilai
    $param['totalsemua'] = $nilai1 + $nilai2;
    
    // Format hasilnya
    $param['totalsemua'] = number_format($param['totalsemua'], 2);
    $query2 = DB::table('biaya_pribadi')
    ->where('cek_status_biaya_pribadi', 1)
    ->where('cek_approval_biaya_pribadi', 0)
    ->where('kode_biaya_pribadi', 'like', "$kodeidpegawaiperus%");

// Tambahkan pencarian jika ada

// Ambil data dengan paginasi
$data2= $query2->orderBy('created_at', 'desc')->paginate(5);

     return view("report.reportbiayapribadi",$param,compact('data','data2'));
    }
    
}
