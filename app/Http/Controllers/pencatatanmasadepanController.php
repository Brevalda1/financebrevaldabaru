<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Pencatatanmasadepan;

class pencatatanmasadepanController extends Controller
{
   
    public function Pencatatanmasadepanform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from pencatatan_biaya_untuk_masa_depan");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_PCTBUMD_".$lempar;
        $param["kode"]=$kodegajipegawai;
 
  
        return view("pencatatanmasadepan.formpencatatanmasadepan",$param);
    }
  
    public function Pencatatanmasadepaninsert(Request $req){
        //echo($req->Fname);
      
            $form_kode_pencatatan_biaya_masa_depan = $req->form_kode_pencatatan_biaya_masa_depan;
            $form_nama_pencatatan_biaya_masa_depan =$req->form_nama_pencatatan_biaya_masa_depan;
            $form_jumlah_pencatatan_biaya_masa_depan =$req->form_jumlah_pencatatan_biaya_masa_depan;
            $form_harga_pencatatan_biaya_masa_depan =$req->form_harga_pencatatan_biaya_masa_depan;
            $form_keterangan_pencatatan_biaya_masa_depan =$req->form_keterangan_pencatatan_biaya_masa_depan;
           
            
            $new = new Pencatatanmasadepan();
            // $new->add($form_id_pegawai_gaji,$kop,$kop,$vop,$vop,$vop,$kop,$vop,$kop,$kop,$kop);
            $new->kode_pencatatan_biaya_masa_depan = $form_kode_pencatatan_biaya_masa_depan;
            $new->nama_pencatatan_biaya_masa_depan = $form_nama_pencatatan_biaya_masa_depan;
            $new->jumlah_pencatatan_biaya_masa_depan = $form_jumlah_pencatatan_biaya_masa_depan;
            $new->harga_pencatatan_biaya_masa_depan=$form_harga_pencatatan_biaya_masa_depan;
            $new->keterangan_pencatatan_biaya_masa_depan=$form_keterangan_pencatatan_biaya_masa_depan;
            $new->cek_status_pencatatan_biaya_masa_depan=1;
            $new->save();
            return redirect("/pencatatanmasadepan");
          
        

    }

    public function Pencatatanmasadepanselect()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from pencatatan_biaya_untuk_masa_depan where cek_status_pencatatan_biaya_masa_depan = 1 order by created_at desc");
            $param['datas'] = $data;
            // dd($param['datas']);
        }
        return view("pencatatanmasadepan.showpencatatanmasadepan",$param);
    }
    public function Pencatatanmasadepanedit($no)
    {
        $new = new Pencatatanmasadepan();
        // $barang = new Barang();
        $arrBarang = $new->getPencatatanMasadepanById($no);
        foreach ($arrBarang as $dt) {
            $data['kode_pencatatan_biaya_masa_depan'] = $dt->kode_pencatatan_biaya_masa_depan;
            $data['nama_pencatatan_biaya_masa_depan'] = $dt->nama_pencatatan_biaya_masa_depan;
            $data['jumlah_pencatatan_biaya_masa_depan'] = $dt->jumlah_pencatatan_biaya_masa_depan;
            $data['harga_pencatatan_biaya_masa_depan'] = $dt->harga_pencatatan_biaya_masa_depan;
            $data['keterangan_pencatatan_biaya_masa_depan'] = $dt->keterangan_pencatatan_biaya_masa_depan;
     
        }
        $data['kode_pencatatan_biaya_masa_depan'] = $no;
        return view('pencatatanmasadepan.editpencatatanmasadepan', $data);
  
    }

    public function Pencatatanmasadepanupdate(Request $req){

        $new = new PencatatanMasadepan();
        $new->updatePencatatanMasadepan($req->form_kode_pencatatan_biaya_masa_depan,
        $req->form_nama_pencatatan_biaya_masa_depan,
        $req->form_jumlah_pencatatan_biaya_masa_depan,
        $req->form_harga_pencatatan_biaya_masa_depan,
        $req->form_keterangan_pencatatan_biaya_masa_depan,
        );

    return redirect('/pencatatanmasadepan');
}

public function Pencatatanmasadepandelete($no)
    {
        $gaji= new PencatatanMasadepan();
        $gaji->deletePencatatanMasadepan($no);
        return redirect('/pencatatanmasadepan');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }
}
