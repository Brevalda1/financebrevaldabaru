<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class reportdetailbiayaoperationalproyekController extends Controller
{
    public function Detailbiayaoperationalproyekselect($id)
{
    // echo $id;

    $param['kodeperus']=$id;
    
   
    $query = DB::table('detail_biaya_operational_proyek')
        ->where('fk_header_biaya_operational',$id)
        ->where('cek_status_detail_biaya_operational_proyek', 1)
        ->where('cek_approval_detail_biaya_operational_proyek',1);
    $data= $query->orderBy('created_at', 'desc')->paginate(5);
    $budget = DB::select("select budget_biaya_operational_proyek as b from header_biaya_operational_proyek where kode_biaya_operational_proyek = '$id'");
    $sum= DB::select("select SUM(db.harga_detail_biaya_operational_proyek) as a from detail_biaya_operational_proyek db where db.fk_header_biaya_operational='$id'and cek_approval_detail_biaya_operational_proyek = 1 and cek_status_detail_biaya_operational_proyek=1");
    $keterangan = DB::select("select * from header_biaya_operational_proyek where kode_biaya_operational_proyek = '$id'");
    $param['budget']=number_format($budget[0]->b);
    
    $param['sum']=number_format($sum[0]->a);
    $param['datas'] = $keterangan;

     return view("report.reportdetailbiayaoperationalproyek",$param,compact('data'));
}
}
