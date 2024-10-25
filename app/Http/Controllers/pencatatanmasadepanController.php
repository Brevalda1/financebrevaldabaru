<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Pencatatanmasadepan;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function Pencatatanmasadepanselect(Request $request)
    {
        $sessiondata = Session()->get('login');
        $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
        // Ambil input pencarian dari user
        $search = $request->input('search');
        
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        } else {
            // Query dasar
            $dataQuery = DB::table('pencatatan_biaya_untuk_masa_depan')
                ->where('cek_status_pencatatan_biaya_masa_depan', 1)
                ->where('kode_pencatatan_biaya_masa_depan', 'like', "$kodeidpegawaiperus%")
                ->orderBy('created_at', 'desc');
    
            // Jika ada pencarian, tambahkan filter pencarian
            if ($search) {
                $dataQuery->where(function($query) use ($search) {
                    $query->where('kode_pencatatan_biaya_masa_depan', 'like', "%$search%")
                          ->orWhere('nama_pencatatan_biaya_masa_depan', 'like', "%$search%")
                          ->orWhere('keterangan_pencatatan_biaya_masa_depan', 'like', "%$search%");
                });
            }
    
            // Pagination dengan 10 item per halaman
            $param['datas'] = $dataQuery->paginate(10)->appends($request->all());
        }
    
        return view("pencatatanmasadepan.showpencatatanmasadepan", $param);
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
    public function downloadReport()
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $param['kodeperus'] = $id;
    
        // Ambil filter tanggal dari request
        // $startDate = $request->input('start_date');
        // $endDate = $request->input('end_date');
    
        // Query 1: Pegawai Gaji dengan filter tanggal
       // Query dasar
       $dataQuery = DB::table('pencatatan_biaya_untuk_masa_depan')
       ->where('cek_status_pencatatan_biaya_masa_depan', 1)
       ->where('kode_pencatatan_biaya_masa_depan', 'like', "$id%")
       ->orderBy('created_at', 'desc');
    
        // Filter tanggal untuk pegawai gaji jika ada
        // if ($startDate && $endDate) {
        //     $sumQuery->whereBetween('created_at', [$startDate, $endDate]);
        // }
    
        // $sum = $sumQuery->sum('total_pegawai_gaji');
        // $param['sum'] = number_format($sum, 2);
    
        // // Query 2: Biaya Operasional Non Budgeting dengan filter tanggal
        // $nonBudgetQuery = DB::table('biaya_operational_non_budgeting')
        //     ->where('cek_status_operational_non_budgeting', 1)
        //     ->where('kode_operational_non_budgeting', 'like', "$id%");
    
        // if ($startDate && $endDate) {
        //     $nonBudgetQuery->whereBetween('created_at', [$startDate, $endDate]);
        // }
    
        // $jumlahbiayaopnonbudget = $nonBudgetQuery->sum('biaya_operational_non_budgeting');
        // $param['nonbudget'] = number_format($jumlahbiayaopnonbudget, 2);
    
        // // Hitung total
        // $param['totalsemua'] = number_format($sum + $jumlahbiayaopnonbudget, 2);
    
        // Ambil data pegawai dan biaya non budgeting untuk PDF
        $data = $dataQuery->paginate(10000);
        // $data2 = $nonBudgetQuery->paginate(10000);
    
        // Masukkan tanggal ke dalam param untuk digunakan di view
        // $param['start_date'] = $startDate;
        // $param['end_date'] = $endDate;
    
        // Generate PDF
        $pdf = PDF::loadView('printreport.reportpencatatanmasadepan', $param, compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pencatatan rekening.pdf');
    }
}
