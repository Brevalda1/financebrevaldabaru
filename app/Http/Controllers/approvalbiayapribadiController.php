<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ApprovalBiayaPribadi;

class approvalbiayapribadiController extends Controller
{
    public function  Approvalbiayapribadiform(){
        return view("approvalbiayapribadi.showapprovalbiayapribadi");
    }
    public function Approvalbiayapribadiselect()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from biaya_pribadi where cek_status_biaya_pribadi = 1 and 
            cek_approval_biaya_pribadi = 2 order by created_at desc");
            $param['datas'] = $data;
            // dd($param['datas']);
        }
        return view("approvalbiayapribadi.showapprovalbiayapribadi",$param);
    }
    public function Approvalbiayapribadiaccept($no)
{
    $gaji = new ApprovalBiayaPribadi();
    $sessiondata = Session()->get('login');
    $kodeidpegawai = $sessiondata['kode_perusahaan'];
    $kodeidpegawai2 = $sessiondata['username'];
    $kodetotal = $kodeidpegawai . ' '.$kodeidpegawai2;

    $gaji->acceptBiayaPribadi($no,$kodetotal);

    return redirect('/approvalbiayapribadi');

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}

public function Approvalbiayapribadidetail($no)
{
    $new = new ApprovalBiayaPribadi();
    // $barang = new Barang();
    $arrBarang = $new->detailBiayaPribadi($no);
    foreach ($arrBarang as $dt) {
        $data['kode_biaya_pribadi'] = $dt->kode_biaya_pribadi;
        $data['nama_biaya_pribadi'] = $dt->nama_biaya_pribadi;
        $data['satuan_biaya_pribadi'] = $dt->satuan_biaya_pribadi;
        $data['harga_biaya_pribadi'] = $dt->harga_biaya_pribadi;
        $data['tanggal_biaya_pribadi'] = $dt->tanggal_biaya_pribadi;
        $data['jumlah_biaya_pribadi'] = $dt->jumlah_biaya_pribadi;
        $data['bukti_biaya_pribadi'] = $dt->bukti_biaya_pribadi;
 
    }
    $data['kode_biaya_pribadi'] = $no;
    return view('approvalbiayapribadi.showapprovalbiayapribadidetail', $data);

   

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}
public function Approvalbiayapribadidecline($no)
{
    $gaji = new ApprovalBiayaPribadi();
    $gaji->declineBiayaPribadi($no);
    return redirect('/approvalbiayapribadi');

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}
}
