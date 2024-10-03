<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenPerusahaan extends Model
{
    use HasFactory;
    public $table   = "perusahaan";
    public $primaryKey = "kode_perusahaan";
    public $incrementing = false;
    public $timestamps = true;
 
    public function add($kode_perusahaan,$nama_perusahaan,$alamat_perusahaan,$nomor_telp_perusahaan)
    {
        $new = new ManajemenPerusahaan();
        $new->kode_perusahaan = $kode_perusahaan;
        $new->nama_perusahaan = $nama_perusahaan;
        $new->alamat_perusahaan = $alamat_perusahaan;
        $new->nomor_telp_perusahaan = $nomor_telp_perusahaan;
        $new->cek_status_perusahaan=1;
        $new->save();
    }
    function getManajemenPerusahaanById($id)
    {
        $dt =  ManajemenPerusahaan::where('kode_perusahaan', '=', $id)
            ->get();
        return $dt;
    }

    function updateManajemenPerusahaan($kode_perusahaan,$nama_perusahaan,$alamat_perusahaan,$nomor_telp_perusahaan)
    
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = ManajemenPerusahaan::find($kode_perusahaan);
        $new->kode_perusahaan = $kode_perusahaan;
        $new->nama_perusahaan = $nama_perusahaan;
        $new->alamat_perusahaan = $alamat_perusahaan;
        $new->nomor_telp_perusahaan = $nomor_telp_perusahaan;
        $new->save();
    }

    function deleteManajemenPerusahaan($id)
    {
        $ins = ManajemenPerusahaan::find($id);
        $ins->cek_status_perusahaan = 0;
        $ins->save();
    }
}
