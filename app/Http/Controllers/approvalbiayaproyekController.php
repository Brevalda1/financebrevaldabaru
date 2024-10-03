<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ApprovalBiayaProyek;


class approvalbiayaproyekController extends Controller
{
    public function Approvalbiayaoperationalproyekform(){
        return view("approvalbiayaproyek.showapprovalbiayaproyek");
    }
    public function Approvalbiayaoperationalproyekselect()
{
    if(Session::Has('datas')){
        $param['datas'] = Session::get('datas');
    }
    else{
        $data = DB::select("select * from detail_biaya_operational_proyek where cek_status_detail_biaya_operational_proyek = 1 and 
        cek_approval_detail_biaya_operational_proyek = 2 order by created_at desc");
        $param['datas'] = $data;
        // dd($param['datas']);
    }
    return view("approvalbiayaproyek.showapprovalbiayaproyek",$param);
}
public function Approvalbiayaoperationalproyekaccept($no)
{
    $gaji = new ApprovalBiayaProyek();

    $gaji->acceptDetailbiayaoperationalproyek($no);
    return redirect('/approvalbiayaproyek');

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}
public function Approvalbiayaoperationalproyekdecline($no)
{
    $gaji = new ApprovalBiayaProyek();
    $gaji->declineDetailbiayaoperationalproyek($no);
    return redirect('/approvalbiayaproyek');

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}
}
