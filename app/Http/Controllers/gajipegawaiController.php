<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\GajiPegawai;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ActionsBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ContextBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\SectionBlock;
use Illuminate\Notifications\Slack\BlockKit\Composites\ConfirmObject;
use Illuminate\Notifications\Slack\SlackMessage;


class gajipegawaiController extends Controller
{
    // public function Gajipegawai(){
    //     return view("showgajipegawai");
    // }
    public function Gajipegawaiform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from pegawai_gaji");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_GJP_".$lempar;
        $param["kode"]=$kodegajipegawai;
        return view("gajipegawai.formgajipegawai",$param);
    }
    public function Gajipegawaiinsert(Request $req){
        // echo($req->Fname);
            $kop='sss';
            $vop=2131;
            $form_id_pegawai_gaji = $req->form_id_pegawai_gaji;
            $form_nomor_ktp_pegawai_gaji =$req->form_nomor_ktp_pegawai_gaji;
            $form_nama_pegawai_gaji =$req->form_nama_pegawai_gaji;
            $form_jumlah_kehadiran_pegawai_gaji =$req->form_jumlah_kehadiran_pegawai_gaji;
            $form_rate_pegawai_gaji =$req->form_rate_pegawai_gaji;
            $form_tambahan_lainlain_pegawai_gaji =$req->form_tambahan_lainlain_pegawai_gaji;
            $form_keterangan_pegawai_gaji =$req->form_keterangan_pegawai_gaji;
            $form_total_pegawai_gaji =$req->form_total_pegawai_gaji;
            $form_nomor_rekening_pegawai_gaji =$req->form_nomor_rekening_pegawai_gaji;
            $form_nama_bank_pegawai_gaji=$req->form_nama_bank_pegawai_gaji;
            $form_jabatan_pegawai_gaji=$req->form_jabatan_pegawai_gaji;
            
            $new = new GajiPegawai();
            // $new->add($form_id_pegawai_gaji,$kop,$kop,$vop,$vop,$vop,$kop,$vop,$kop,$kop,$kop);
            $new->id_pegawai_gaji = $form_id_pegawai_gaji;
            $new->nomor_ktp_pegawai_gaji = $form_nomor_ktp_pegawai_gaji;
            $new->nama_pegawai_gaji = $form_nama_pegawai_gaji;
            $new->jumlah_kehadiran_pegawai_gaji=$form_jumlah_kehadiran_pegawai_gaji;
            $new->rate_pegawai_gaji=$form_rate_pegawai_gaji;
            $new->tambahan_lainlain_pegawai_gaji=$form_tambahan_lainlain_pegawai_gaji;
            $new->keterangan_pegawai_gaji=$form_keterangan_pegawai_gaji;
            $new->total_pegawai_gaji=$form_total_pegawai_gaji;
            $new->jabatan_pegawai_gaji = $form_jabatan_pegawai_gaji;
            $new->nomor_rekening_pegawai_gaji =$form_nomor_rekening_pegawai_gaji;
            $new->nama_bank_pegawai_gaji=$form_nama_bank_pegawai_gaji;
            $new->cek_aktif_gajipegawai=1;
      

            $new->save();
            // $de='inv-';
            // $du='wwr';
            // $hasil = $de.$du;
            //     $id = IdGenerator::generate(['table' => 'pegawai_gaji', 'length' => 10, 'prefix' => $hasil]);
    
            //     dd($id);
            //     // $ud = IdGenerator::generate(['table' => 'pegawai_gaji', 'length' => 10, 'prefix' => 'INV-']);
            //     // dd($ud);
             
            //     // $todo->save();
            
            // dd($new);
            
            return redirect("/gajipegawai");
          
        

    }

    public function Gajipegawaiselect()
    {
        $sessiondata = Session()->get('login');
        $kodeidpegawai = $sessiondata['kode_perusahaan'];
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from pegawai_gaji where cek_aktif_gajipegawai = 1 AND id_pegawai_gaji like '$kodeidpegawai%' order by created_at desc");
            $param['datas'] = $data;
            // dd($param['datas']);
        }
        return view("gajipegawai.showgajipegawai",$param);
    }
    public function Gajipegawaiedit($no)
    {
        $new = new GajiPegawai();
        // $barang = new Barang();
        $arrBarang = $new->getGajipegawaiById($no);
        foreach ($arrBarang as $dt) {
            $data['id_pegawai_gaji'] = $dt->id_pegawai_gaji;
            $data['nomor_ktp_pegawai_gaji'] = $dt->nomor_ktp_pegawai_gaji;
            $data['nama_pegawai_gaji'] = $dt->nama_pegawai_gaji;
            $data['jumlah_kehadiran_pegawai_gaji'] = $dt->jumlah_kehadiran_pegawai_gaji;
            $data['rate_pegawai_gaji'] = $dt->rate_pegawai_gaji;
            $data['tambahan_lainlain_pegawai_gaji'] = $dt->tambahan_lainlain_pegawai_gaji;
            $data['keterangan_pegawai_gaji'] = $dt->keterangan_pegawai_gaji;
            $data['total_pegawai_gaji'] = $dt->total_pegawai_gaji;
            $data['jabatan_pegawai_gaji'] = $dt->jabatan_pegawai_gaji;
            $data['nomor_rekening_pegawai_gaji'] = $dt->nomor_rekening_pegawai_gaji;
            $data['nama_bank_pegawai_gaji'] = $dt->nama_bank_pegawai_gaji;

            // $new->id_pegawai_gaji = $form_id_pegawai_gaji;
            // $new->nomor_ktp_pegawai_gaji = $form_nomor_ktp_pegawai_gaji;
            // $new->nama_pegawai_gaji = $form_nama_pegawai_gaji;
            // $new->jumlah_kehadiran_pegawai_gaji=$form_jumlah_kehadiran_pegawai_gaji;
            // $new->rate_pegawai_gaji=$form_rate_pegawai_gaji;
            // $new->tambahan_lainlain_pegawai_gaji=$form_tambahan_lainlain_pegawai_gaji;
            // $new->keterangan_pegawai_gaji=$form_keterangan_pegawai_gaji;
            // $new->total_pegawai_gaji=$form_total_pegawai_gaji;
            // $new->jabatan_pegawai_gaji = $form_jabatan_pegawai_gaji;
            // $new->nomor_rekening_pegawai_gaji =$form_nomor_rekening_pegawai_gaji;
            // $new->nama_bank_pegawai_gaji=$form_nama_bank_pegawai_gaji;
            // $data['HARGA_BARANG'] = $dt->HARGA_BARANG;
            // $data['lazada_sku'] = $dt->lazada_sku;
        }
        $data['id_pegawai_gaji'] = $no;
        return view('gajipegawai.editgajipegawai', $data);
  
    }

    public function GajiPegawaiupdate(Request $req){

 


        $new = new GajiPegawai();
        $new->updateGajipegawai($req->form_id_pegawai_gaji,
        $req->form_nomor_ktp_pegawai_gaji,
        $req->form_nama_pegawai_gaji,
        $req->form_jumlah_kehadiran_pegawai_gaji,
        $req->form_rate_pegawai_gaji,
        $req->form_tambahan_lainlain_pegawai_gaji,
        $req->form_keterangan_pegawai_gaji,
        $req->form_total_pegawai_gaji,
        $req->form_nomor_rekening_pegawai_gaji,
        $req->form_nama_bank_pegawai_gaji,
        $req->form_jabatan_pegawai_gaji
        );

    return redirect('/gajipegawai');
}

public function GajiPegawaidelete($no)
    {
        $gaji= new GajiPegawai();
        $gaji->deleteGajipegawai($no);
        return redirect('/gajipegawai');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }
}
