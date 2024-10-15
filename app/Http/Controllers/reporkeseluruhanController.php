<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Barryvdh\DomPDF\ServiceProvider;
use Barryvdh\DomPDF\Facade\Pdf;

class reporkeseluruhanController extends Controller
{
    public function Reportselect(Request $request)
{
    // Ambil tanggal dari request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Query 1: Pegawai Gaji berdasarkan kode_perusahaan (tanpa filter tanggal)
    $query1 = DB::table('pegawai_gaji')
        ->select(DB::raw('SUBSTRING(id_pegawai_gaji, 1, 4) as kode_perusahaan, SUM(total_pegawai_gaji) as total_gaji'))
        ->where('cek_aktif_gajipegawai', 1)
        ->groupBy(DB::raw('SUBSTRING(id_pegawai_gaji, 1, 4)'))
        ->get();

    $labels1 = [];
    $data1 = [];
    foreach ($query1 as $row) {
        $labels1[] = $row->kode_perusahaan;
        $data1[] = $row->total_gaji;
    }

    // Query 2: Biaya Operasional Non Budgeting (dengan filter tanggal)
    $query2 = DB::table('biaya_operational_non_budgeting')
        ->select(DB::raw('SUBSTRING(kode_operational_non_budgeting, 1, 4) as kode_operasional, SUM(biaya_operational_non_budgeting) as total_biaya'))
        ->where('cek_status_operational_non_budgeting', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_operational_non_budgeting, 1, 4)'))
        ->get();

    $labels2 = [];
    $data2 = [];
    foreach ($query2 as $row) {
        $labels2[] = $row->kode_operasional;
        $data2[] = $row->total_biaya;
    }

    // Query 3: Detail Biaya Operasional Proyek (dengan filter tanggal)
    $query3 = DB::table('detail_biaya_operational_proyek')
        ->select(DB::raw('SUBSTRING(kode_biaya_detail_operational_proyek, 1, 4) as kode_detail, SUM(harga_detail_biaya_operational_proyek) as total_detail_biaya'))
        ->where('cek_status_detail_biaya_operational_proyek', 1)
        ->where('cek_approval_detail_biaya_operational_proyek', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_biaya_detail_operational_proyek, 1, 4)'))
        ->get();

    $labels3 = [];
    $data3 = [];
    foreach ($query3 as $row) {
        $labels3[] = $row->kode_detail;
        $data3[] = $row->total_detail_biaya;
    }

    // Query 4: Biaya Pribadi (dengan filter tanggal)
    $query4 = DB::table('biaya_pribadi')
        ->select(DB::raw('SUBSTRING(kode_biaya_pribadi, 1, 4) as kode_pribadi, SUM(harga_biaya_pribadi) as total_pribadi'))
        ->where('cek_status_biaya_pribadi', 1)
        ->where('cek_approval_biaya_pribadi', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_biaya_pribadi, 1, 4)'))
        ->get();

    $labels4 = [];
    $data4 = [];
    foreach ($query4 as $row) {
        $labels4[] = $row->kode_pribadi;
        $data4[] = $row->total_pribadi;
    }

    // Query 5: Biaya Lain-lain (dengan filter tanggal)
    $query5 = DB::table('biaya_lainlain')
        ->select(DB::raw('SUBSTRING(kode_biaya_lainlain, 1, 4) as kode_lain, SUM(harga_biaya_lainlain) as total_lain'))
        ->where('cek_status_biaya_lainlain', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_biaya_lainlain, 1, 4)'))
        ->get();

    $labels5 = [];
    $data5 = [];
    foreach ($query5 as $row) {
        $labels5[] = $row->kode_lain;
        $data5[] = $row->total_lain;
    }

    // Gabungkan semua data untuk pie chart total
    $totalData = [];
    $this->combineData($totalData, $query1, 'kode_perusahaan', 'total_gaji');
    $this->combineData($totalData, $query2, 'kode_operasional', 'total_biaya');
    $this->combineData($totalData, $query3, 'kode_detail', 'total_detail_biaya');
    $this->combineData($totalData, $query4, 'kode_pribadi', 'total_pribadi');
    $this->combineData($totalData, $query5, 'kode_lain', 'total_lain');

    // Kirim data ke view
    return view('report.reportkeseluruhan', [
        'labels1' => $labels1, 'data1' => $data1,
        'labels2' => $labels2, 'data2' => $data2,
        'labels3' => $labels3, 'data3' => $data3,
        'labels4' => $labels4, 'data4' => $data4,
        'labels5' => $labels5, 'data5' => $data5,
        'totalData' => $totalData,
        'startDate' => $startDate,
        'endDate' => $endDate,
    ]);
}

private function combineData(&$totalData, $queryResult, $labelKey, $valueKey)
{
    foreach ($queryResult as $row) {
        if (!isset($totalData[$row->$labelKey])) {
            $totalData[$row->$labelKey] = 0;
        }
        $totalData[$row->$labelKey] += $row->$valueKey;
    }
}

public function downloadPDF(Request $request)
{
    // Ambil tanggal dari request (untuk filter)
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Query 1: Pegawai Gaji (tanpa filter tanggal)
    $query1 = DB::table('pegawai_gaji')
        ->select(DB::raw('SUBSTRING(id_pegawai_gaji, 1, 4) as kode_perusahaan, SUM(total_pegawai_gaji) as total_gaji'))
        ->where('cek_aktif_gajipegawai', 1)
        ->groupBy(DB::raw('SUBSTRING(id_pegawai_gaji, 1, 4)'))
        ->get();

    $labels1 = [];
    $data1 = [];
    foreach ($query1 as $row) {
        $labels1[] = $row->kode_perusahaan;
        $data1[] = $row->total_gaji;
    }

    // Query 2: Biaya Operasional Non Budgeting (dengan filter tanggal)
    $query2 = DB::table('biaya_operational_non_budgeting')
        ->select(DB::raw('SUBSTRING(kode_operational_non_budgeting, 1, 4) as kode_operasional, SUM(biaya_operational_non_budgeting) as total_biaya'))
        ->where('cek_status_operational_non_budgeting', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_operational_non_budgeting, 1, 4)'))
        ->get();

    $labels2 = [];
    $data2 = [];
    foreach ($query2 as $row) {
        $labels2[] = $row->kode_operasional;
        $data2[] = $row->total_biaya;
    }

    // Query 3: Detail Biaya Operasional Proyek (dengan filter tanggal)
    $query3 = DB::table('detail_biaya_operational_proyek')
        ->select(DB::raw('SUBSTRING(kode_biaya_detail_operational_proyek, 1, 4) as kode_detail, SUM(harga_detail_biaya_operational_proyek) as total_detail_biaya'))
        ->where('cek_status_detail_biaya_operational_proyek', 1)
        ->where('cek_approval_detail_biaya_operational_proyek', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_biaya_detail_operational_proyek, 1, 4)'))
        ->get();

    $labels3 = [];
    $data3 = [];
    foreach ($query3 as $row) {
        $labels3[] = $row->kode_detail;
        $data3[] = $row->total_detail_biaya;
    }

    // Query 4: Biaya Pribadi (dengan filter tanggal)
    $query4 = DB::table('biaya_pribadi')
        ->select(DB::raw('SUBSTRING(kode_biaya_pribadi, 1, 4) as kode_pribadi, SUM(harga_biaya_pribadi) as total_pribadi'))
        ->where('cek_status_biaya_pribadi', 1)
        ->where('cek_approval_biaya_pribadi', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_biaya_pribadi, 1, 4)'))
        ->get();

    $labels4 = [];
    $data4 = [];
    foreach ($query4 as $row) {
        $labels4[] = $row->kode_pribadi;
        $data4[] = $row->total_pribadi;
    }

    // Query 5: Biaya Lain-lain (dengan filter tanggal)
    $query5 = DB::table('biaya_lainlain')
        ->select(DB::raw('SUBSTRING(kode_biaya_lainlain, 1, 4) as kode_lain, SUM(harga_biaya_lainlain) as total_lain'))
        ->where('cek_status_biaya_lainlain', 1)
        ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->groupBy(DB::raw('SUBSTRING(kode_biaya_lainlain, 1, 4)'))
        ->get();

    $labels5 = [];
    $data5 = [];
    foreach ($query5 as $row) {
        $labels5[] = $row->kode_lain;
        $data5[] = $row->total_lain;
    }

    // Gabungkan semua data untuk chart total
    $totalData = [];
    $this->combineData($totalData, $query1, 'kode_perusahaan', 'total_gaji');
    $this->combineData($totalData, $query2, 'kode_operasional', 'total_biaya');
    $this->combineData($totalData, $query3, 'kode_detail', 'total_detail_biaya');
    $this->combineData($totalData, $query4, 'kode_pribadi', 'total_pribadi');
    $this->combineData($totalData, $query5, 'kode_lain', 'total_lain');

    // Generate PDF dari view
    $pdf = PDF::loadView('report.pie_charts', compact('labels1', 'data1', 'labels2', 'data2', 'labels3', 'data3', 'labels4', 'data4', 'labels5', 'data5', 'totalData', 'startDate', 'endDate'));

    // Set page format A4 landscape
    return $pdf->setPaper('a4', 'landscape')->download('report.pdf');
}

private function combineData2(&$totalData, $queryResult, $labelKey, $valueKey)
{
    foreach ($queryResult as $row) {
        if (!isset($totalData[$row->$labelKey])) {
            $totalData[$row->$labelKey] = 0;
        }
        $totalData[$row->$labelKey] += $row->$valueKey;
    }
}

}
