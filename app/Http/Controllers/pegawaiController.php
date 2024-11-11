<?php

namespace App\Http\Controllers;

use App\Models\ManajemenPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;


class pegawaiController extends Controller
{
    //
    public function Pegawaiform(){
        $dataperusahaan = DB::select("select * from perusahaan where cek_status_perusahaan = 1 order by created_at desc");
        $param['datas'] = $dataperusahaan;

        return view("pegawai.formpegawai",$param);
    }
    public function Pegawaiinsert(Request $req){
        //echo($req->Fname);

        
       

          $form_username=  $req->form_username;
             $form_password   =$req->form_password ;
             $form_nama_pegawai   = $req->form_nama_pegawai ;
              $form_role    = $req->form_role;
             $form_nomor_telp_pegawai    = $req->form_nomor_telp_pegawai;
         $form_jabatan_pegawai  = $req->form_jabatan_pegawai;

         $form_perusahaan = $req->form_perusahaan;

            $pass = Hash::make($form_password);

 
        // $new = new Pegawai();
        // //$new->add($nama,$username,$email,$pass,$stat);
        // $new->Username = "bre";
        // $new->password = $pass;
    
        // $new->save();

            $new = new Pegawai();
            // $new->add($form_id_pegawai_gaji,$kop,$kop,$vop,$vop,$vop,$kop,$vop,$kop,$kop,$kop);
            $new->username = $form_username;
            $new->password = $pass;
            $new->nama_pegawai = $form_nama_pegawai;
            $new->role=$form_role;
            $new->nomor_telp_pegawai=$form_nomor_telp_pegawai;
            $new->jabatan_pegawai=$form_jabatan_pegawai;
            $new->cek_status_pegawai=1;
            $new->kode_perusahaan=$form_perusahaan;
      

            $new->save();
            return redirect("/pegawai");
          
        

    }

   public function Pegawaiselect()
{
    if (Session::has('datas')) {
        $param['datas'] = Session::get('datas');
    } else {
        // Ambil semua data pegawai tanpa pagination
        $data = DB::table('pegawai')
            ->where('cek_status_pegawai', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $param['datas'] = $data;
    }
    return view("pegawai.showpegawai", $param);
}

    public function Pegawaiedit($no)
    {
        $dataperusahaan = DB::select("select * from perusahaan where cek_status_perusahaan = 1 order by created_at desc");
        $param['datas'] = $dataperusahaan;
        $new = new Pegawai();
        // $barang = new Barang();
        $arrBarang = $new->getPegawaiById($no);
        foreach ($arrBarang as $dt) {
            $data['username'] = $dt->username;
            $data['password'] = $dt->password;
            $data['nama_pegawai'] = $dt->nama_pegawai;
            $data['role'] = $dt->role;
            $data['nomor_telp_pegawai'] = $dt->nomor_telp_pegawai;
            $data['jabatan_pegawai'] = $dt->jabatan_pegawai;
            $data['kode_perusahaan'] = $dt->kode_perusahaan;
          

        }
        $data['username'] = $no;
        return view('pegawai.editpegawai', $data,$param);
  
    }

    public function Pegawaiupdate(Request $req){
     ;

        $pass = Hash::make($req->form_password);

        $new = new Pegawai();
        $new->updatePegawai($req->form_username,
       $pass,
        $req->form_nama_pegawai,
        $req->form_role,
        $req->form_nomor_telp_pegawai,
        $req->form_jabatan_pegawai,
        $req->form_perusahaan
      
        );

    return redirect('/pegawai');
}

public function Pegawaidelete($no)
    {
        $gaji= new Pegawai();
        $gaji->deletePegawai($no);
        return redirect('/pegawai');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }

    
}
