<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\BiayaOperationalNonBudgeting;

class biayaoperationalnonbudgetingController extends Controller
{
    // public function Biayaoperationalnonbudgeting(){
    //     return view("showbiayaoperationalnonbudgeting");
    // }
    public function Biayaoperationalnonbudgetingform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from biaya_operational_non_budgeting");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_BONB_".$lempar;
        $param["kode"]=$kodegajipegawai;
   
       

        return view("biayaoperationalnonbudgeting.formbiayaoperationalnonbudgeting",$param);
    }
    public function Biayaoperationalnonbudgetinginsert(Request $req){

      
            $form_kode_operational_non_budgeting = $req->form_kode_operational_non_budgeting;
            $form_nama_operational_non_budgeting =$req->form_nama_operational_non_budgeting;
            $form_keterangan_operational_non_budgeting =$req->form_keterangan_operational_non_budgeting;
            $form_tanggal_operational_non_budgeting =$req->form_tanggal_operational_non_budgeting;
            $form_biaya_operational_non_budgeting =$req->form_biaya_operational_non_budgeting;


            $new = new BiayaOperationalNonBudgeting();
            $new->kode_operational_non_budgeting = $form_kode_operational_non_budgeting;
            $new->nama_operational_non_budgeting = $form_nama_operational_non_budgeting;
            $new->keterangan_operational_non_budgeting = $form_keterangan_operational_non_budgeting;
            $new->tanggal_operational_non_budgeting = $form_tanggal_operational_non_budgeting;
            $new->biaya_operational_non_budgeting=$form_biaya_operational_non_budgeting;
   
            $new->cek_status_operational_non_budgeting=1;
      
            $new->save();
            return redirect("/biayaoperationalnonbudgeting");
          
        

    }

    public function Biayaoperationalnonbudgetingselect(Request $request)
{
    $sessiondata = Session()->get('login');
    $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
    $search = $request->input('search');
    
    if (Session::has('datas')) {
        $param['datas'] = Session::get('datas');
    } else {
        // Query dasar dengan kondisi pencarian
        $dataQuery = DB::table('biaya_operational_non_budgeting')
            ->where('cek_status_operational_non_budgeting', 1)
            ->where('kode_operational_non_budgeting', 'like', "$kodeidpegawaiperus%")
            ->orderBy('created_at', 'desc');

        // Jika ada input pencarian, tambahkan kondisi filter
        if ($search) {
            $dataQuery->where(function ($query) use ($search) {
                $query->where('kode_operational_non_budgeting', 'like', "%$search%")
                      ->orWhere('nama_operational_non_budgeting', 'like', "%$search%")
                      ->orWhere('keterangan_operational_non_budgeting', 'like', "%$search%")
                      ->orWhere('tanggal_operational_non_budgeting', 'like', "%$search%");
            });
        }

        // Mengambil semua hasil tanpa pagination Laravel
        $param['datas'] = $dataQuery->get();
    }

    return view("biayaoperationalnonbudgeting.showbiayaoperationalnonbudgeting", $param);
}

    

    public function Biayaoperationalnonbudgetingedit($no)
    {
        $new = new BiayaOperationalNonBudgeting();
        // $barang = new Barang();
        $arrBarang = $new->getBiayaOperationalNonBudgetingById($no);
        foreach ($arrBarang as $dt) {
            $data['kode_operational_non_budgeting'] = $dt->kode_operational_non_budgeting;
            $data['nama_operational_non_budgeting'] = $dt->nama_operational_non_budgeting;

            $data['keterangan_operational_non_budgeting'] = $dt->keterangan_operational_non_budgeting;
            $data['tanggal_operational_non_budgeting'] = $dt->tanggal_operational_non_budgeting;
            $data['biaya_operational_non_budgeting'] = $dt->biaya_operational_non_budgeting;

     
        }
        $data['kode_operational_non_budgeting'] = $no;
        return view('biayaoperationalnonbudgeting.editbiayaoperationalnonbudgeting', $data);
  
    }

    public function Biayaoperationalnonbudgetingupdate(Request $req){



        $new = new BiayaOperationalNonBudgeting();
        $new->updateBiayaOperationalNonBudgeting($req->form_kode_operational_non_budgeting,
        $req->form_nama_operational_non_budgeting,
        $req->form_keterangan_operational_non_budgeting,
        $req->form_tanggal_operational_non_budgeting,
        $req->form_biaya_operational_non_budgeting,
   
        );

    return redirect('/biayaoperationalnonbudgeting');
}

public function Biayaoperationalnonbudgetingdelete($no)
    {
        $gaji= new BiayaOperationalNonBudgeting();
        $gaji->deleteBiayaOperationalNonBudgeting($no);
        return redirect('/biayaoperationalnonbudgeting');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }
}
