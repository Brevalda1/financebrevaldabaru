<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Barryvdh\DomPDF\ServiceProvider;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;




class reportopertionalController extends Controller
{
    public function Reportselect(Request $request)
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $param['kodeperus'] = $id;
    
        // Ambil filter tanggal dari request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Query 1: Pegawai Gaji dengan filter tanggal
        $sumQuery = DB::table('pegawai_gaji')
            ->where('cek_aktif_gajipegawai', 1)
            ->where('id_pegawai_gaji', 'like', "$id%");
    
        // Filter tanggal untuk pegawai gaji jika ada
        if ($startDate && $endDate) {
            $sumQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $sum = $sumQuery->sum('total_pegawai_gaji');
        $param['sum'] = number_format($sum, 2);
    
        // Ambil data pegawai dengan paginasi
        $data = $sumQuery->orderBy('created_at', 'desc')->paginate(5);
    
        // Query 2: Biaya Operasional Non Budgeting dengan filter tanggal
        $nonBudgetQuery = DB::table('biaya_operational_non_budgeting')
            ->where('cek_status_operational_non_budgeting', 1)
            ->where('kode_operational_non_budgeting', 'like', "$id%");
    
        // Filter tanggal hanya untuk tabel biaya_operasional_non_budgeting
        if ($startDate && $endDate) {
            $nonBudgetQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $jumlahbiayaopnonbudget = $nonBudgetQuery->sum('biaya_operational_non_budgeting');
        $param['nonbudget'] = number_format($jumlahbiayaopnonbudget, 2);
    
        // Hitung total dari gaji pegawai dan biaya non budgeting
        $param['totalsemua'] = number_format($sum + $jumlahbiayaopnonbudget, 2);
    
        // Ambil data biaya non budgeting dengan paginasi
        $data2 = $nonBudgetQuery->orderBy('created_at', 'desc')->paginate(5);
    
        // Masukkan tanggal ke dalam param untuk dipakai di view
        $param['start_date'] = $startDate;
        $param['end_date'] = $endDate;
    
        return view('report.reportoperational', $param, compact('data', 'data2'));
    }
    public function downloadReport(Request $request)
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $param['kodeperus'] = $id;
    
        // Ambil filter tanggal dari request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Query 1: Pegawai Gaji dengan filter tanggal
        $sumQuery = DB::table('pegawai_gaji')
            ->where('cek_aktif_gajipegawai', 1)
            ->where('id_pegawai_gaji', 'like', "$id%");
    
        // Filter tanggal untuk pegawai gaji jika ada
        if ($startDate && $endDate) {
            $sumQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $sum = $sumQuery->sum('total_pegawai_gaji');
        $param['sum'] = number_format($sum, 2);
    
        // Query 2: Biaya Operasional Non Budgeting dengan filter tanggal
        $nonBudgetQuery = DB::table('biaya_operational_non_budgeting')
            ->where('cek_status_operational_non_budgeting', 1)
            ->where('kode_operational_non_budgeting', 'like', "$id%");
    
        if ($startDate && $endDate) {
            $nonBudgetQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $jumlahbiayaopnonbudget = $nonBudgetQuery->sum('biaya_operational_non_budgeting');
        $param['nonbudget'] = number_format($jumlahbiayaopnonbudget, 2);
    
        // Hitung total
        $param['totalsemua'] = number_format($sum + $jumlahbiayaopnonbudget, 2);
    
        // Ambil data pegawai dan biaya non budgeting untuk PDF
        $data = $sumQuery->paginate(10000);
        $data2 = $nonBudgetQuery->paginate(10000);
    
        // Masukkan tanggal ke dalam param untuk digunakan di view
        $param['start_date'] = $startDate;
        $param['end_date'] = $endDate;
    
        // Generate PDF
        $pdf = PDF::loadView('printreport.reportoperational', $param, compact('data', 'data2'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-operasional.pdf');
    }

}
