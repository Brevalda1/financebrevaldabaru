<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\ManajemenPerusahaan;


class manajemenperusahaanController extends Controller
{
    public function ManajemenPerusahaanform(){
        return view("manajemenperusahaan.formmanajemenperusahaan");
    }
    public function ManajemenPerusahaaninsert(Request $req){

                 $form_kode_perusahaan=  $req->form_kode_perusahaan;
             $form_nama_perusahaan =$req->form_nama_perusahaan ;
             $form_alamat_perusahaan = $req->form_alamat_perusahaan ;
              $form_nomor_telp_perusahaan    = $req->form_nomor_telp_perusahaan;
           


    
 
  

            $new = new ManajemenPerusahaan();
            // $new->add($form_id_pegawai_gaji,$kop,$kop,$vop,$vop,$vop,$kop,$vop,$kop,$kop,$kop);
            $new->kode_perusahaan = $form_kode_perusahaan;
            $new->nama_perusahaan = $form_nama_perusahaan;
            $new->alamat_perusahaan = $form_alamat_perusahaan;
            $new->nomor_telp_perusahaan=$form_nomor_telp_perusahaan;
       
         
            $new->cek_status_perusahaan=1;
      

            $new->save();
            return redirect("/manajemenperusahaan");
          
        

    }

    public function ManajemenPerusahaanselect()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from perusahaan where cek_status_perusahaan = 1 order by created_at desc");
            $param['datas'] = $data;
            // dd($param['datas']);
        }
        return view("manajemenperusahaan.showmanajemenperusahaan",$param);
    }
    public function ManajemenPerusahaanedit($no)
    {
        $new = new ManajemenPerusahaan();
        // $barang = new Barang();
        $arrBarang = $new->getManajemenPerusahaanById($no);
        foreach ($arrBarang as $dt) {
            $data['kode_perusahaan'] = $dt->kode_perusahaan;
            $data['nama_perusahaan'] = $dt->nama_perusahaan;
            $data['alamat_perusahaan'] = $dt->alamat_perusahaan;
            $data['nomor_telp_perusahaan'] = $dt->nomor_telp_perusahaan;
           
          

        }
        $data['kode_perusahaan'] = $no;
        return view('manajemenperusahaan.editmanajemenperusahaan', $data);
  
    }

    public function ManajemenPerusahaanupdate(Request $req){
     
        $form_kode_perusahaan=  $req->form_kode_perusahaan;
        $form_nama_perusahaan =$req->form_nama_perusahaan ;
        $form_alamat_perusahaan = $req->form_alamat_perusahaan ;
         $form_nomor_telp_perusahaan    = $req->form_nomor_telp_perusahaan;

     


         $new = new ManajemenPerusahaan();
         $new->updateManajemenPerusahaan(
            $form_kode_perusahaan,
            $form_nama_perusahaan,
            $form_alamat_perusahaan,
            $form_nomor_telp_perusahaan
         );

        // $new = new ManajemenPerusahaan();
        // $new->updateManajemenPerusahaan($form_kode_perusahaaan,
        // $form_nama_perusahaaan,
        // $form_alamat_perusahaaan,
        // $form_nomor_telp_perusahaaan
        // );

    return redirect('/manajemenperusahaan');
}

public function ManajemenPerusahaandelete($no)
    {
        $gaji= new ManajemenPerusahaan();
        $gaji->deleteManajemenPerusahaan($no);
        return redirect('/manajemenperusahaan');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }
}
