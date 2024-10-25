<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class reporbiayaoperationalproyekController extends Controller
{
    public function Reportselect(){
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $jumlahestimasi= DB::select("select SUM(db.budget_biaya_operational_proyek) as a from header_biaya_operational_proyek db where db.kode_biaya_operational_proyek like '$id%' and cek_status_header_biaya_operational_proyek=1 ");
        $param['kodeperus']= $id;
        $param['sum']=number_format($jumlahestimasi[0]->a);
        $jumlahestimasi2= DB::select("select SUM(db.harga_detail_biaya_operational_proyek) as a from detail_biaya_operational_proyek db where db.kode_biaya_detail_operational_proyek like '$id%' and cek_status_detail_biaya_operational_proyek=1 and cek_approval_detail_biaya_operational_proyek =1");
        $param['sum2']=number_format($jumlahestimasi2[0]->a);
        $sessiondata = Session()->get('login');
        $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
        $query = DB::table('header_biaya_operational_proyek')
        ->where('cek_status_header_biaya_operational_proyek', 1)
        ->where('kode_biaya_operational_proyek', 'like', "$kodeidpegawaiperus%");
        $data = $query->orderBy('created_at', 'desc')->paginate(5);

        return view("report.reportbiayaoperationalproyek",$param,compact('data'));

    }
    public function generatePDF()
    {
        // Mengambil parameter kode perusahaan
        $sessiondata = Session()->get('login');
        $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
        $param['kodeperus']= $kodeidpegawaiperus;
        // Query untuk mendapatkan header biaya dan total biaya detailnya
        $query = DB::table('header_biaya_operational_proyek as hb')
            ->leftJoin('detail_biaya_operational_proyek as db', 'db.fk_header_biaya_operational', '=', 'hb.kode_biaya_operational_proyek')
            ->select(
                'hb.kode_biaya_operational_proyek',
                'hb.nama_biaya_operational_proyek',
                'hb.budget_biaya_operational_proyek',
                'hb.keterangan_biaya_operational_proyek',
                'hb.tanggal_pelaksanaan_biaya_operational_proyek',
                'hb.created_at',
                DB::raw('SUM(db.harga_detail_biaya_operational_proyek) as total_biaya_detail')
            )
            ->where('hb.cek_status_header_biaya_operational_proyek', 1)
            ->where('hb.kode_biaya_operational_proyek', 'like', "$kodeidpegawaiperus%")
            ->where('db.cek_approval_detail_biaya_operational_proyek', 1)
            ->where('db.cek_status_detail_biaya_operational_proyek', 1)
            ->groupBy(
                'hb.kode_biaya_operational_proyek',
                'hb.nama_biaya_operational_proyek',
                'hb.budget_biaya_operational_proyek',
                'hb.keterangan_biaya_operational_proyek',
                'hb.tanggal_pelaksanaan_biaya_operational_proyek',
                'hb.created_at'
            )
            ->orderBy('hb.created_at', 'desc');
    
        // Mengambil data dengan pagination
        $data = $query->paginate(5);
    
        // Mengambil budget dari header biaya operational proyek
        $budget = DB::select("SELECT budget_biaya_operational_proyek as b FROM header_biaya_operational_proyek WHERE kode_biaya_operational_proyek = '$kodeidpegawaiperus'");
        
        // Menghitung total harga detail biaya operational proyek
        $sum = DB::select("SELECT SUM(db.harga_detail_biaya_operational_proyek) as a FROM detail_biaya_operational_proyek db WHERE db.fk_header_biaya_operational = '$kodeidpegawaiperus' AND cek_approval_detail_biaya_operational_proyek = 1 AND cek_status_detail_biaya_operational_proyek = 1");
        
        // Mengambil keterangan dari header biaya operational proyek
        $keterangan = DB::select("SELECT * FROM header_biaya_operational_proyek WHERE kode_biaya_operational_proyek = '$kodeidpegawaiperus'");
        $jumlahestimasi= DB::select("select SUM(db.budget_biaya_operational_proyek) as a from header_biaya_operational_proyek db where db.kode_biaya_operational_proyek like '$kodeidpegawaiperus%' and cek_status_header_biaya_operational_proyek=1 ");
        $param['kodeperus']= $kodeidpegawaiperus;
        $param['suma']=number_format($jumlahestimasi[0]->a);
        $jumlahestimasi2= DB::select("select SUM(db.harga_detail_biaya_operational_proyek) as a from detail_biaya_operational_proyek db where db.kode_biaya_detail_operational_proyek like '$kodeidpegawaiperus%' and cek_status_detail_biaya_operational_proyek=1 and cek_approval_detail_biaya_operational_proyek =1");
        $param['sum2']=number_format($jumlahestimasi2[0]->a);
        // Memformat data untuk tampilan
        $param['budget'] = !empty($budget) ? number_format($budget[0]->b) : '0';
        $param['sum'] = !empty($sum) ? number_format($sum[0]->a) : '0';
        $param['datas'] = $keterangan;
    
        // Load view untuk PDF
        $pdf = PDF::loadView('printreport.reportbiayaoperationalproyek', $param, compact('data'))
            ->setPaper('a4', 'landscape');
    
        // Mengembalikan file PDF
        return $pdf->download('laporan-detail-biaya-operational-proyek.pdf');
    }
    

}
