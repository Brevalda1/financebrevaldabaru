<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class reportopertionalController extends Controller
{
    public function Reportselect()
{
    // echo $id;

    // $param['kodeperus']=$id;
    
    // if(Session::Has('datas')){
    //     $param['datas'] = Session::get('datas');
    // }
    // else{
    //     $data = DB::select("select * from detail_biaya_operational_proyek where fk_header_biaya_operational = '$id' and cek_status_detail_biaya_operational_proyek = 1 and 
    //     cek_approval_detail_biaya_operational_proyek = 1 order by created_at desc");
    //     $param['datas'] = $data;
       
    // }
    $sessiondata = Session()->get('login');
    $id = $sessiondata['kode_perusahaan'];


    // $budget = DB::select("select budget_biaya_operational_proyek as b from header_biaya_operational_proyek where kode_biaya_operational_proyek = '$id'");
    $sum= DB::select("select SUM(db.total_pegawai_gaji) as a from pegawai_gaji db where db.Id_pegawai_gaji like '$id%' and cek_aktif_gajipegawai=1");


    // $param['budget']=number_format($budget[0]->b);
    $param['kodeperus']= $id;
    $param['sum']=number_format($sum[0]->a);
 
    // untuk menampilkan data

    $sessiondata = Session()->get('login');
    $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
    //     if(Session::Has('datas')){
    //         $param['datas'] = Session::get('datas');
    //     }
    //     else{
       
    //         // $data = DB::select("select * from pegawai_gaji where cek_aktif_gajipegawai = 1 AND id_pegawai_gaji like '$kodeidpegawai%' order by created_at desc");
    //         $data = DB::table('pegawai_gaji')
    // ->where('cek_aktif_gajipegawai', 1)
    // ->where('id_pegawai_gaji', 'like', "$kodeidpegawai%")
    // ->orderBy('created_at', 'desc')
    // ->paginate(5);
    //         $param['datas'] = $data;
    //         // dd($param['datas']);
            
    //     }
        //ini

   
    // Mulai query
    $query = DB::table('pegawai_gaji')
        ->where('cek_aktif_gajipegawai', 1)
        ->where('id_pegawai_gaji', 'like', "$kodeidpegawaiperus%");

    // Tambahkan pencarian jika ada

    // Ambil data dengan paginasi
    $data = $query->orderBy('created_at', 'desc')->paginate(5);

    // return view('pegawai.index', compact('data', 'search', 'kodeidpegawai'));
    // return view("gajipegawai.showgajipegawai",compact('data', 'search', 'kodeidpegawai'));

    //pencatatan masa depan 
    $jumlahbiayaopnonbudget= DB::select("select SUM(db.biaya_operational_non_budgeting) as a from biaya_operational_non_budgeting db where db.kode_operational_non_budgeting like '$id%' and cek_status_operational_non_budgeting=1");


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
    $query2 = DB::table('biaya_operational_non_budgeting')
    ->where('cek_status_operational_non_budgeting', 1)
    ->where('kode_operational_non_budgeting', 'like', "$kodeidpegawaiperus%");

// Tambahkan pencarian jika ada

// Ambil data dengan paginasi
$data2= $query2->orderBy('created_at', 'desc')->paginate(5);

     return view("report.reportoperational",$param,compact('data','data2'));
    }
}
