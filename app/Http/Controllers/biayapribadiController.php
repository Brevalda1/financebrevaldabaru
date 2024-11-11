<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Biayapribadi;

class biayapribadiController extends Controller
{
    // public function Biayapribadi(){
    //     return view("biayapribadi.showbiayapribadi");
    // }
    public function Biayapribadiform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from biaya_pribadi");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_BPR_".$lempar;
        $param["kode"]=$kodegajipegawai;
   
       
        return view("biayapribadi.formbiayapribadi",$param);
    }
    public function Biayapribadiinsert(Request $req){

      
            $form_kode_biaya_pribadi = $req->form_kode_biaya_pribadi;
            $form_nama_biaya_pribadi =$req->form_nama_biaya_pribadi;
            $form_satuan_biaya_pribadi =$req->form_satuan_biaya_pribadi;
            $form_harga_biaya_pribadi =$req->form_harga_biaya_pribadi;
            $form_tanggal_biaya_pribadi =$req->form_tanggal_biaya_pribadi;
            $form_jumlah_biaya_pribadi =$req->form_jumlah_biaya_pribadi;
            $form_bukti_biaya_pribadi =$req->form_bukti_biaya_pribadi;
            $namagambar = $form_bukti_biaya_pribadi->getClientOriginalName();

            $new = new Biayapribadi();
            $new->kode_biaya_pribadi = $form_kode_biaya_pribadi;
            $new->nama_biaya_pribadi = $form_nama_biaya_pribadi;
            $new->satuan_biaya_pribadi = $form_satuan_biaya_pribadi;
            $new->harga_biaya_pribadi = $form_harga_biaya_pribadi;
            $new->tanggal_biaya_pribadi=$form_tanggal_biaya_pribadi;
            $new->jumlah_biaya_pribadi=$form_jumlah_biaya_pribadi;
            $new->bukti_biaya_pribadi=$namagambar;
            $form_bukti_biaya_pribadi->move("BiayaPribadiBukti",$namagambar);
            $new->cek_status_biaya_pribadi=1;
            $new->cek_approval_biaya_pribadi=2;

        
      
            $new->save();
            return redirect("/biayapribadi");
          
        

    }

    public function Biayapribadiselect(Request $request)
    {    
        $sessiondata = Session()->get('login');
        $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
        $search = $request->input('search');
        
        if (Session::has('datas')) {
            $param['datas'] = Session::get('datas');
        } else {
            // Query dasar
            $dataQuery = DB::table('biaya_pribadi')
                ->where('cek_status_biaya_pribadi', 1)
                ->where('cek_approval_biaya_pribadi', 1)
                ->where('kode_biaya_pribadi', 'like', "$kodeidpegawaiperus%")
                ->orderBy('created_at', 'desc');
    
            // Jika ada pencarian, tambahkan filter pencarian
            if ($search) {
                $dataQuery->where(function ($query) use ($search) {
                    $query->where('kode_biaya_pribadi', 'like', "%$search%")
                          ->orWhere('nama_biaya_pribadi', 'like', "%$search%")
                          ->orWhere('satuan_biaya_pribadi', 'like', "%$search%")
                          ->orWhere('harga_biaya_pribadi', 'like', "%$search%")
                          ->orWhere('tanggal_biaya_pribadi', 'like', "%$search%");
                });
            }
    
            // Mengambil semua hasil tanpa pagination
            $param['datas'] = $dataQuery->get();
        }
    
        return view("biayapribadi.showbiayapribadi", $param);
    }
    

    public function Biayapribadiedit($no)
    {
        $new = new Biayapribadi();
        // $barang = new Barang();
        $arrBarang = $new->getBiayapribadiById($no);
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
        return view('biayapribadi.editbiayapribadi', $data);
  
    }

    public function Biayapribadiupdate(Request $req){

        $form_bukti_biaya_pribadi =$req->form_bukti_biaya_pribadi;
        $namagambar = $form_bukti_biaya_pribadi->getClientOriginalName();

        $new = new Biayapribadi();
        $new->updateBiayaPribadi($req->form_kode_biaya_pribadi,
        $req->form_nama_biaya_pribadi,
        $req->form_satuan_biaya_pribadi,
        $req->form_harga_biaya_pribadi,
        $req->form_tanggal_biaya_pribadi,
        $req->form_jumlah_biaya_pribadi,
        $req->form_bukti_biaya_pribadi,
        $namagambar
        );

    return redirect('/biayapribadi');
}

public function Biayapribadidelete($no)
    {
        $gaji= new Biayapribadi();
        $gaji->deleteBiayaPribadi($no);
        return redirect('/biayapribadi');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }
}
