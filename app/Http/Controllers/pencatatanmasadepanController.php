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
        $namadatapegawai = DB::select("select * from pencatatan_biaya_untuk_masa_depan");
        $lempar = count($namadatapegawai) + 1;
        $kodegajipegawai = $sessiondata['kode_perusahaan'] . "_PCTBUMD_" . $lempar;
        $param["kode"] = $kodegajipegawai;

        return view("pencatatanmasadepan.formpencatatanmasadepan", $param);
    }
  
    public function Pencatatanmasadepaninsert(Request $req){
        $form_kode_pencatatan_biaya_masa_depan = $req->form_kode_pencatatan_biaya_masa_depan;
        $form_nama_pencatatan_biaya_masa_depan = $req->form_nama_pencatatan_biaya_masa_depan;
        $form_jumlah_pencatatan_biaya_masa_depan = $req->form_jumlah_pencatatan_biaya_masa_depan;
        $form_harga_pencatatan_biaya_masa_depan = $req->form_harga_pencatatan_biaya_masa_depan;
        $form_keterangan_pencatatan_biaya_masa_depan = $req->form_keterangan_pencatatan_biaya_masa_depan;
        $form_tanggal_pencatatan_biaya_masa_depan = $req->form_tanggal_pencatatan_biaya_masa_depan;

        $new = new Pencatatanmasadepan();
        $new->kode_pencatatan_biaya_masa_depan = $form_kode_pencatatan_biaya_masa_depan;
        $new->nama_pencatatan_biaya_masa_depan = $form_nama_pencatatan_biaya_masa_depan;
        $new->jumlah_pencatatan_biaya_masa_depan = $form_jumlah_pencatatan_biaya_masa_depan;
        $new->harga_pencatatan_biaya_masa_depan = $form_harga_pencatatan_biaya_masa_depan;
        $new->keterangan_pencatatan_biaya_masa_depan = $form_keterangan_pencatatan_biaya_masa_depan;
        $new->tanggal_pencatatan_biaya_masa_depan = $form_tanggal_pencatatan_biaya_masa_depan;
        $new->cek_status_pencatatan_biaya_masa_depan = 1;
        $new->save();
        
        return redirect("/pencatatanmasadepan");
    }

    public function Pencatatanmasadepanselect(Request $request)
    {
        $sessiondata = Session()->get('login');
        $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $dataQuery = DB::table('pencatatan_biaya_untuk_masa_depan')
            ->where('cek_status_pencatatan_biaya_masa_depan', 1)
            ->where('kode_pencatatan_biaya_masa_depan', 'like', "$kodeidpegawaiperus%");

        // Filter tanggal jika ada
        if ($startDate && $endDate) {
            $dataQuery->whereBetween('tanggal_pencatatan_biaya_masa_depan', [$startDate, $endDate]);
        }

        // Jika ada pencarian, tambahkan filter pencarian
        if ($search) {
            $dataQuery->where(function($query) use ($search) {
                $query->where('kode_pencatatan_biaya_masa_depan', 'like', "%$search%")
                      ->orWhere('nama_pencatatan_biaya_masa_depan', 'like', "%$search%")
                      ->orWhere('keterangan_pencatatan_biaya_masa_depan', 'like', "%$search%");
            });
        }

        // Total biaya untuk periode ini
        $totalBiaya = $dataQuery->sum('harga_pencatatan_biaya_masa_depan');
        
        // Pagination dengan 10 item per halaman
        $param['datas'] = $dataQuery->paginate(10)->appends($request->all());
        $param['totalBiaya'] = $totalBiaya;

        return view("pencatatanmasadepan.showpencatatanmasadepan", $param);
    }
    
    public function Pencatatanmasadepanedit($no)
{
    $new = new Pencatatanmasadepan();
    $arrBarang = $new->getPencatatanMasadepanById($no);
    foreach ($arrBarang as $dt) {
        $data['kode_pencatatan_biaya_masa_depan'] = $dt->kode_pencatatan_biaya_masa_depan;
        $data['nama_pencatatan_biaya_masa_depan'] = $dt->nama_pencatatan_biaya_masa_depan;
        $data['jumlah_pencatatan_biaya_masa_depan'] = $dt->jumlah_pencatatan_biaya_masa_depan;
        $data['harga_pencatatan_biaya_masa_depan'] = $dt->harga_pencatatan_biaya_masa_depan;
        $data['keterangan_pencatatan_biaya_masa_depan'] = $dt->keterangan_pencatatan_biaya_masa_depan;
        $data['tanggal_pencatatan_biaya_masa_depan'] = $dt->tanggal_pencatatan_biaya_masa_depan;
    }
    $data['kode_pencatatan_biaya_masa_depan'] = $no;
    return view('pencatatanmasadepan.editpencatatanmasadepan', $data);
}

public function Pencatatanmasadepanupdate(Request $req){
    $new = PencatatanMasadepan::find($req->form_kode_pencatatan_biaya_masa_depan);
    $new->nama_pencatatan_biaya_masa_depan = $req->form_nama_pencatatan_biaya_masa_depan;
    $new->jumlah_pencatatan_biaya_masa_depan = $req->form_jumlah_pencatatan_biaya_masa_depan;
    $new->harga_pencatatan_biaya_masa_depan = $req->form_harga_pencatatan_biaya_masa_depan;
    $new->keterangan_pencatatan_biaya_masa_depan = $req->form_keterangan_pencatatan_biaya_masa_depan;
    $new->tanggal_pencatatan_biaya_masa_depan = $req->form_tanggal_pencatatan_biaya_masa_depan;
    $new->save();

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
    public function downloadReport(Request $request)
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $dataQuery = DB::table('pencatatan_biaya_untuk_masa_depan')
            ->where('cek_status_pencatatan_biaya_masa_depan', 1)
            ->where('kode_pencatatan_biaya_masa_depan', 'like', "$id%");
    
        // Filter tanggal untuk laporan jika ada
        if ($startDate && $endDate) {
            $dataQuery->whereBetween('tanggal_pencatatan_biaya_masa_depan', [$startDate, $endDate]);
        }
    
        // Ambil data dan total biaya untuk PDF
        $data = $dataQuery->get();
        $totalBiaya = $dataQuery->sum('harga_pencatatan_biaya_masa_depan');
    
        // Generate PDF
        $pdf = Pdf::loadView('printreport.reportpencatatanmasadepan', compact('data', 'totalBiaya', 'startDate', 'endDate'))
            ->setPaper('a4', 'landscape');
        
        return $pdf->download('laporan-pencatatan-rekening.pdf');
    }
    
}
