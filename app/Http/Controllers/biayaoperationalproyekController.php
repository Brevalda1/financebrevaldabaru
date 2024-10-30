<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\BiayaOperationalProyek;

class biayaoperationalproyekController extends Controller
{
    // public function Biayaoperationalproyek(){
    //     return view("biayaoperationalproyek.showbiayaoperationalproyek");
    // }
    public function Biayaoperationalproyekform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from header_biaya_operational_proyek");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_BOP_".$lempar;
        $param["kode"]=$kodegajipegawai;
   
        return view("biayaoperationalproyek.formbiayaoperationalproyek",$param);
    }
    public function BiayaOperationalProyekinsert(Request $req){

      
        $form_kode_biaya_operational_proyek = $req->form_kode_biaya_operational_proyek;
        $form_nama_biaya_operational_proyek =$req->form_nama_biaya_operational_proyek;
        $form_budget_biaya_operational_proyek =$req->form_budget_biaya_operational_proyek;
        $form_keterangan_biaya_operational_proyek =$req->form_keterangan_biaya_operational_proyek;
        $form_tanggal_pelaksanaan_biaya_operational_proyek =$req->form_tanggal_pelaksanaan_biaya_operational_proyek;
      


        $new = new BiayaOperationalProyek();
        $new->kode_biaya_operational_proyek = $form_kode_biaya_operational_proyek;
        $new->nama_biaya_operational_proyek = $form_nama_biaya_operational_proyek;
        $new->budget_biaya_operational_proyek=$form_budget_biaya_operational_proyek;
        $new->keterangan_biaya_operational_proyek = $form_keterangan_biaya_operational_proyek;
        $new->tanggal_pelaksanaan_biaya_operational_proyek = $form_tanggal_pelaksanaan_biaya_operational_proyek;


        $new->cek_status_header_biaya_operational_proyek=1;
  
        $new->save();
        return redirect("/biayaoperationalproyek");
      
    

}

public function BiayaOperationalProyekselect(Request $request)
{
    // Get the search input from the request
    $search = $request->input('search');

    if (Session::has('datas')) {
        $datas = Session::get('datas');
    } else {
        // Build the query
        $query = DB::table('header_biaya_operational_proyek')
            ->where('cek_status_header_biaya_operational_proyek', 1)
            ->orderBy('created_at', 'desc');

        // Apply search filters if search input is provided
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('nama_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('budget_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('keterangan_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('tanggal_pelaksanaan_biaya_operational_proyek', 'like', "%$search%");
            });
        }

        // Paginate the results
        $datas = $query->paginate(5); // Adjust the number per page as needed
    }

    // Pass the data and search term to the view
    return view('BiayaOperationalProyek.showBiayaOperationalProyekshow', ['datas' => $datas, 'search' => $search]);
}
public function BiayaOperationalProyekselecta(Request $request)
{
    // Get the search input from the request
    $search = $request->input('search');

    if (Session::has('datas')) {
        $datas = Session::get('datas');
    } else {
        // Build the query
        $query = DB::table('header_biaya_operational_proyek')
            ->where('cek_status_header_biaya_operational_proyek', 1)
            ->orderBy('created_at', 'desc');

        // Apply search filters if search input is provided
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('nama_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('budget_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('keterangan_biaya_operational_proyek', 'like', "%$search%")
                  ->orWhere('tanggal_pelaksanaan_biaya_operational_proyek', 'like', "%$search%");
            });
        }

        // Paginate the results
        $datas = $query->paginate(5); // Adjust the number per page as needed
    }

    // Pass the data and search term to the view
    return view('BiayaOperationalProyek.showBiayaOperationalProyek', ['datas' => $datas, 'search' => $search]);
}

public function BiayaOperationalProyekedit($no)
{
    $new = new BiayaOperationalProyek();
    // $barang = new Barang();
    $arrBarang = $new->getBiayaOperationalProyekById($no);
    foreach ($arrBarang as $dt) {
        $data['kode_biaya_operational_proyek'] = $dt->kode_biaya_operational_proyek;
        $data['nama_biaya_operational_proyek'] = $dt->nama_biaya_operational_proyek;
        $data['budget_biaya_operational_proyek'] = $dt->budget_biaya_operational_proyek;
        $data['keterangan_biaya_operational_proyek'] = $dt->keterangan_biaya_operational_proyek;
        $data['tanggal_pelaksanaan_biaya_operational_proyek'] = $dt->tanggal_pelaksanaan_biaya_operational_proyek;


 
    }
    $data['kode_biaya_operational_proyek'] = $no;
    return view('BiayaOperationalProyek.editBiayaOperationalProyek', $data);

}

public function BiayaOperationalProyekupdate(Request $req){



    $new = new BiayaOperationalProyek();
    $new->updateBiayaOperationalProyek($req->form_kode_biaya_operational_proyek,
    $req->form_nama_biaya_operational_proyek,
    $req->form_budget_biaya_operational_proyek,
    $req->form_keterangan_biaya_operational_proyek,
    $req->form_tanggal_pelaksanaan_biaya_operational_proyek


    );

return redirect('/biayaoperationalproyek');
}

public function BiayaOperationalProyekdelete($no)
{
    $gaji= new BiayaOperationalProyek();
    $gaji->deleteBiayaOperationalProyek($no);
    return redirect('/biayaoperationalproyek');

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}

//U


}
