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
 

     return view("report.reportoperational",$param);
    }
}
