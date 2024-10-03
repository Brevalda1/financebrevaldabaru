<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaLainLain extends Model
{
    use HasFactory;
    public $table   = "biaya_lainlain";
    public $primaryKey = "kode_biaya_lainlain";
    public $incrementing = false;
    public $timestamps = true;

    public function addBiayaLainLain($kode_biaya_lainlain,$nama_biaya_lainlain,
    $satuan_biaya_lainlain,$harga_biaya_lainlain,
    $tanggal_biaya_lainlain,$jumlah_biaya_lainlain,$bukti_biaya_lainlain)
    {
        $new = new BiayaLainLain();
        $new->kode_biaya_lainlain = $kode_biaya_lainlain;
        $new->nama_biaya_lainlain = $nama_biaya_lainlain;
        $new->satuan_biaya_lainlain = $satuan_biaya_lainlain;
        $new->harga_biaya_lainlain = $harga_biaya_lainlain;
        $new->tanggal_biaya_lainlain=$tanggal_biaya_lainlain;
        $new->jumlah_biaya_lainlain=$jumlah_biaya_lainlain;
        $new->bukti_biaya_lainlain=$bukti_biaya_lainlain;
        $new->cek_status_biaya_lainlain=1;
        $new->save();
    }

    function getBiayaLainLainById($id)
    {
        $dt =  BiayaLainLain::where('kode_biaya_lainlain', '=', $id)
            ->get();
        return $dt;
    }

    function updateBiayaLainLain($kode_biaya_lainlain,$nama_biaya_lainlain,
    $satuan_biaya_lainlain,$harga_biaya_lainlain,
    $tanggal_biaya_lainlain,$jumlah_biaya_lainlain,$bukti_biaya_lainlain,$namagambar)
    
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = BiayaLainLain::find($kode_biaya_lainlain);

        $new->nama_biaya_lainlain = $nama_biaya_lainlain;
        $new->satuan_biaya_lainlain = $satuan_biaya_lainlain;
        $new->harga_biaya_lainlain = $harga_biaya_lainlain;
        $new->tanggal_biaya_lainlain=$tanggal_biaya_lainlain;
        $new->jumlah_biaya_lainlain=$jumlah_biaya_lainlain;
        $new->bukti_biaya_lainlain=$bukti_biaya_lainlain;
        $new->bukti_biaya_lainlain=$namagambar;
        $bukti_biaya_lainlain->move("BiayaLainLainBukti",$namagambar);
        $new->save();
    }
    

    function deleteBiayaLainLain($id)
    {
        $ins = BiayaLainLain::find($id);
        $ins->cek_status_biaya_lainlain=0;
        $ins->save();
    }


}
