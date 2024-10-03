<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaOperationalProyek extends Model
{
    use HasFactory;
    public $table   = "header_biaya_operational_proyek";
    public $primaryKey = "kode_biaya_operational_proyek";
    public $incrementing = false;
    public $timestamps = true;

    public function addBiayaOperationalProyek($kode_biaya_operational_proyek,
    $nama_biaya_operational_proyek,$budget_biaya_operational_proyek,
    $keterangan_biaya_operational_proyek,
    $tanggal_pelaksanaan_biaya_operational_proyek)
    {
        $new = new BiayaOperationalProyek();
        $new->kode_biaya_operational_proyek = $kode_biaya_operational_proyek;
        $new->nama_biaya_operational_proyek = $nama_biaya_operational_proyek;
        $new->budget_biaya_operational_proyek=$budget_biaya_operational_proyek;
        $new->keterangan_biaya_operational_proyek = $keterangan_biaya_operational_proyek;
        $new->tanggal_pelaksanaan_biaya_operational_proyek=$tanggal_pelaksanaan_biaya_operational_proyek;
        $new->cek_status_header_biaya_operational_proyek=1;
        $new->save();
    }

    function getBiayaOperationalProyekById($id)
    {
        $dt =  BiayaOperationalProyek::where('kode_biaya_operational_proyek', '=', $id)
            ->get();
        return $dt;
    }

    function updateBiayaOperationalProyek($kode_biaya_operational_proyek,
    $nama_biaya_operational_proyek,$budget_biaya_operational_proyek,
    $keterangan_biaya_operational_proyek,
    $tanggal_pelaksanaan_biaya_operational_proyek)
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = BiayaOperationalProyek::find($kode_biaya_operational_proyek);
        $new->kode_biaya_operational_proyek = $kode_biaya_operational_proyek;
        $new->nama_biaya_operational_proyek = $nama_biaya_operational_proyek;
        $new->budget_biaya_operational_proyek=$budget_biaya_operational_proyek;
        $new->keterangan_biaya_operational_proyek = $keterangan_biaya_operational_proyek;
        $new->tanggal_pelaksanaan_biaya_operational_proyek=$tanggal_pelaksanaan_biaya_operational_proyek;

        $new->save();
    }
    

    function deleteBiayaOperationalProyek($id)
    {
        $ins = BiayaOperationalProyek::find($id);
        $ins->cek_status_header_biaya_operational_proyek=0;
        $ins->save();
    }

}
