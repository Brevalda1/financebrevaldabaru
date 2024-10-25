<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\PencatatanRekening;
use Barryvdh\DomPDF\Facade\Pdf;

class pencatatanrekeningController extends Controller
{
    // public function Pencatatanrekening(){
    //     return view("pencatatanrekening.showpencatatanrekening");
    // }
    public function Pencatatanrekeningform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from pencatatan_rekening_partner");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_PCTREK_".$lempar;
        $param["kode"]=$kodegajipegawai;
 
    
        return view("pencatatanrekening.formpencatatanrekening",$param);
    }


    public function Pencatatanrekeninginsert(Request $req){
        //echo($req->Fname);
            $form_kode_pencatatan_rekening_partner = $req->form_kode_pencatanan_rekening_partner;
            $form_nama_perusahaan_partner =$req->form_nama_perusahaan_partner;
            $form_nomor_rekening_perusahaan_partner =$req->form_nomor_rekening_perusahaan_partner;
            $form_kode_transfer_rekening_perusahaan_partner =$req->form_kode_transfer_rekening_perusahaan_partner;
            $form_nama_bank_perusahaan_partner =$req->form_nama_bank_perusahaan_partner;
            $form_keterangan_pencatatan_rekening_partner =$req->form_keterangan_pencatatan_rekening_partner;
            $new = new PencatatanRekening();
         
            $new->kode_pencatatan_rekening_partner = $form_kode_pencatatan_rekening_partner;
            $new->nama_perusahaan_partner = $form_nama_perusahaan_partner;
            $new->nomor_rekening_perusahaan_partner = $form_nomor_rekening_perusahaan_partner;
            $new->kode_transfer_rekening_perusahaan_partner=$form_kode_transfer_rekening_perusahaan_partner;
            $new->nama_bank_perusahaan_partner=$form_nama_bank_perusahaan_partner;
            $new->keterangan_pencatatan_rekening_partner=$form_keterangan_pencatatan_rekening_partner;
            $new->cek_status_pencatatanrekening =1;
      

            $new->save();
            return redirect("/pencatatanrekening");
          
        

    }

    public function Pencatatanrekeningselect(Request $request)
{
    $sessiondata = Session()->get('login');
    $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
    // Ambil query pencarian
    $search = $request->input('search');
    
    // Jika ada session 'datas', ambil dari session
    if(Session::Has('datas')){
        $param['datas'] = Session::get('datas');
    } else {
        // Query untuk pencarian dan pagination
        $dataQuery = DB::table('pencatatan_rekening_partner')
            ->where('cek_status_pencatatanrekening', 1)
            ->where('kode_pencatatan_rekening_partner', 'like', "$kodeidpegawaiperus%");

        // Jika ada pencarian, tambahkan kondisi filter
        if ($search) {
            $dataQuery->where(function ($query) use ($search) {
                $query->where('kode_pencatatan_rekening_partner', 'like', "%$search%")->orWhere('nama_perusahaan_partner', 'like', "%$search%")
                      ->orWhere('nomor_rekening_perusahaan_partner', 'like', "%$search%")
                      ->orWhere('kode_transfer_rekening_perusahaan_partner', 'like', "%$search%")
                      ->orWhere('nama_bank_perusahaan_partner', 'like', "%$search%")
                       ->orWhere('nama_bank_perusahaan_partner', 'like', "%$search%");
            });
        }

        // Pagination
        $param['datas'] = $dataQuery->paginate(10)->appends($request->all());
    }

    return view("pencatatanrekening.showpencatatanrekening", $param);
}

    public function PencatatanRekeningedit($no)
    {
        $new = new PencatatanRekening();
        // $barang = new Barang();
        $arrBarang = $new->getPencatatanRekeningById($no);
        foreach ($arrBarang as $dt) {
            $data['kode_pencatatan_rekening_partner'] = $dt->kode_pencatatan_rekening_partner;
            $data['nama_perusahaan_partner'] = $dt->nama_perusahaan_partner;
            $data['nomor_rekening_perusahaan_partner'] = $dt->nomor_rekening_perusahaan_partner;
            $data['kode_transfer_rekening_perusahaan_partner'] = $dt->kode_transfer_rekening_perusahaan_partner;
            $data['nama_bank_perusahaan_partner'] = $dt->nama_bank_perusahaan_partner;
            $data['keterangan_pencatatan_rekening_partner'] = $dt->keterangan_pencatatan_rekening_partner;
        }
        $data['kode_pencatatan_rekening_partner'] = $no;
        return view('pencatatanrekening.editpencatatanrekening', $data);
  
    }

    public function PencatatanRekeningupdate(Request $req){

 


        $new = new PencatatanRekening();
        
        $new->updatePencatatanRekening($req->form_kode_pencatanan_rekening_partner,
        $req->form_nama_perusahaan_partner,
        $req->form_nomor_rekening_perusahaan_partner,
        $req->form_kode_transfer_rekening_perusahaan_partner,
        $req->form_nama_bank_perusahaan_partner,
        $req->form_keterangan_pencatatan_rekening_partner
        );


    return redirect('/pencatatanrekening');
}

public function Pencatatanrekeningdelete($no)
    {
        $gaji= new PencatatanRekening();
        $gaji->deletePencatatanrekening($no);
        return redirect('/pencatatanrekening');

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
       $dataQuery = DB::table('pencatatan_rekening_partner')
       ->where('cek_status_pencatatanrekening', 1)
       ->where('kode_pencatatan_rekening_partner', 'like', "$id%");

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
        $pdf = PDF::loadView('printreport.reportpencatatanrekening', $param, compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pencatatan rekening.pdf');
    }
}

