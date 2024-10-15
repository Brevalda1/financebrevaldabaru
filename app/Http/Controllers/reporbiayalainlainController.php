<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class reporbiayalainlainController extends Controller
{
    public function Reportselect(Request $request)
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $param['kodeperus'] = $id;

        // Ambil filter tanggal dari request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query 1: Menghitung total biaya lain-lain dengan filter tanggal (jika ada)
        $sumQuery = DB::table('biaya_lainlain')
            ->where('cek_status_biaya_lainlain', 1)
            ->where('kode_biaya_lainlain', 'like', "$id%");

        if ($startDate && $endDate) {
            $sumQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        $sum = $sumQuery->sum('harga_biaya_lainlain');
        $param['sum'] = number_format($sum, 2);

        // Query 2: Data biaya lain-lain dengan filter tanggal
        $query = DB::table('biaya_lainlain')
            ->where('cek_status_biaya_lainlain', 1)
            ->where('kode_biaya_lainlain', 'like', "$id%");

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data = $query->orderBy('created_at', 'desc')->paginate(5);

        // Query 3: Menghitung total biaya pribadi yang ditolak dengan filter tanggal (jika ada)
        $jumlahbiayaopnonbudgetQuery = DB::table('biaya_pribadi')
            ->where('cek_status_biaya_pribadi', 1)
            ->where('cek_approval_biaya_pribadi', 0)
            ->where('kode_biaya_pribadi', 'like', "$id%");

        if ($startDate && $endDate) {
            $jumlahbiayaopnonbudgetQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        $jumlahbiayaopnonbudget = $jumlahbiayaopnonbudgetQuery->sum('harga_biaya_pribadi');
        $param['nonbudget'] = number_format($jumlahbiayaopnonbudget, 2);

        // Hitung total biaya
        $nilai1 = $sum;
        $nilai2 = $jumlahbiayaopnonbudget;
        $param['totalsemua'] = number_format($nilai1 + $nilai2, 2);

        // Query 4: Data biaya pribadi yang ditolak dengan filter tanggal
        $query2 = DB::table('biaya_pribadi')
            ->where('cek_status_biaya_pribadi', 1)
            ->where('cek_approval_biaya_pribadi', 0)
            ->where('kode_biaya_pribadi', 'like', "$id%");

        if ($startDate && $endDate) {
            $query2->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data2 = $query2->orderBy('created_at', 'desc')->paginate(5);

        return view("report.reportbiayalainlain", $param, compact('data', 'data2'));
    }

    public function generatePDF(Request $request)
    {
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];
        $param['kodeperus'] = $id;
        $sessiondata = Session()->get('login');
        $id = $sessiondata['kode_perusahaan'];

        // Mengambil total harga biaya lain-lain dengan filter tanggal
        $sumQuery = DB::table('biaya_lainlain')
            ->where('cek_status_biaya_lainlain', 1)
            ->where('kode_biaya_lainlain', 'like', "$id%");

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
            $sumQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        $sum = $sumQuery->sum('harga_biaya_lainlain');
        $param['sum'] = number_format($sum, 2);

        // Query untuk menampilkan data biaya lain-lain dengan filter tanggal
        $query = DB::table('biaya_lainlain')
            ->where('cek_status_biaya_lainlain', 1)
            ->where('kode_biaya_lainlain', 'like', "$id%");

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data = $query->orderBy('created_at', 'desc')->paginate(5);

        // Menghitung total biaya pribadi yang ditolak
        $jumlahbiayaopnonbudgetQuery = DB::table('biaya_pribadi')
            ->where('cek_status_biaya_pribadi', 1)
            ->where('cek_approval_biaya_pribadi', 0)
            ->where('kode_biaya_pribadi', 'like', "$id%");

        if ($startDate && $endDate) {
            $jumlahbiayaopnonbudgetQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        $jumlahbiayaopnonbudget = $jumlahbiayaopnonbudgetQuery->sum('harga_biaya_pribadi');
        $param['nonbudget'] = number_format($jumlahbiayaopnonbudget, 2);

        // Hitung total biaya
        $param['totalsemua'] = number_format($sum + $jumlahbiayaopnonbudget, 2);

        // Ambil data biaya pribadi yang ditolak
        $data2 = DB::table('biaya_pribadi')
            ->where('cek_status_biaya_pribadi', 1)
            ->where('cek_approval_biaya_pribadi', 0)
            ->where('kode_biaya_pribadi', 'like', "$id%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // Generate PDF
        $pdf = PDF::loadView('printreport.reportbiayalainlain', $param, compact('data', 'data2'))
            ->setPaper('a4', 'landscape'); // Set ukuran dan orientasi PDF

        return $pdf->download('laporan-biaya-lainlain.pdf');
    }
    
}
