<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class reporbiayaoperationalproyekController extends Controller
{
    public function Reportselect(){
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $jumlahestimasi= DB::select("select SUM(db.budget_biaya_operational_proyek) as a from header_biaya_operational_proyek db where db.kode_biaya_operational_proyek like '$id%' and cek_status_header_biaya_operational_proyek=1 ");
        $param['kodeperus']= $id;
        $param['sum']=number_format($jumlahestimasi[0]->a);
        $jumlahestimasi2= DB::select("select SUM(db.harga_detail_biaya_operational_proyek) as a from detail_biaya_operational_proyek db where db.kode_biaya_detail_operational_proyek like '$id%' and cek_status_detail_biaya_operational_proyek=1 and cek_approval_detail_biaya_operational_proyek =1");
        $param['sum2']=number_format($jumlahestimasi2[0]->a);
        $sessiondata = Session()->get('login');
        $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
        $query = DB::table('header_biaya_operational_proyek')
        ->where('cek_status_header_biaya_operational_proyek', 1)
        ->where('kode_biaya_operational_proyek', 'like', "$kodeidpegawaiperus%");
        $data = $query->orderBy('created_at', 'desc')->paginate(5);

        return view("report.reportbiayaoperationalproyek",$param,compact('data'));

    }
}
