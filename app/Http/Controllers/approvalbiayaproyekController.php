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
  
    $sessiondata = Session()->get('login');
    $kodeidpegawai = $sessiondata['kode_perusahaan'];
    $kodeidpegawai2 = $sessiondata['username'];
    $kodetotal = $kodeidpegawai . ' '.$kodeidpegawai2;

    $gaji = new ApprovalBiayaProyek();

    $gaji->acceptDetailbiayaoperationalproyek($no,$kodetotal);
    return redirect('/approvalbiayaproyek');

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}

public function Approvalbiayaoperationalproyekdetail($no)
{
    $new = new ApprovalBiayaProyek();
    // $barang = new Barang();
    $arrBarang = $new->detailDetailbiayaoperationalproyek($no);
    foreach ($arrBarang as $dt) {
      
 
        $data['kode_biaya_detail_operational_proyek'] = $dt->kode_biaya_detail_operational_proyek;
        $data['nama_biaya_detail_biaya_operational_proyek'] = $dt->nama_biaya_detail_biaya_operational_proyek	;
        $data['jumlah_detail_biaya_operational_proyek'] = $dt->jumlah_detail_biaya_operational_proyek;
        $data['harga_detail_biaya_operational_proyek'] = $dt->harga_detail_biaya_operational_proyek;
        $data['bukti_detail_biaya_operational_proyek'] = $dt->bukti_detail_biaya_operational_proyek;

    }
    $data['kode_biaya_detail_operational_proyek'] = $no;
 
    return view('approvalbiayaproyek.showapprovalbiayaproyekdetail', $data);
  


   

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
