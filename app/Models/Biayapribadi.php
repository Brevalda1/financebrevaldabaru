<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biayapribadi extends Model
{
    use HasFactory;
    public $table   = "biaya_pribadi";
    public $primaryKey = "kode_biaya_pribadi";
    public $incrementing = false;
    public $timestamps = true;

    public function addBiayaPribadi($kode_biaya_pribadi,$nama_biaya_pribadi,
    $satuan_biaya_pribadi,$harga_biaya_pribadi,
    $tanggal_biaya_pribadi,$jumlah_biaya_pribadi,$bukti_biaya_pribadi)
    {
        $new = new BiayaPribadi();
        $new->kode_biaya_pribadi = $kode_biaya_pribadi;
        $new->nama_biaya_pribadi = $nama_biaya_pribadi;
        $new->satuan_biaya_pribadi = $satuan_biaya_pribadi;
        $new->harga_biaya_pribadi = $harga_biaya_pribadi;
        $new->tanggal_biaya_pribadi=$tanggal_biaya_pribadi;
        $new->jumlah_biaya_pribadi=$jumlah_biaya_pribadi;
        $new->bukti_biaya_pribadi=$bukti_biaya_pribadi;
        $new->cek_status_biaya_pribadi=2;
        $new->save();
    }

    function getBiayaPribadiById($id)
    {
        $dt =  BiayaPribadi::where('kode_biaya_pribadi', '=', $id)
            ->get();
        return $dt;
    }

    function updateBiayaPribadi($kode_biaya_pribadi,$nama_biaya_pribadi,
    $satuan_biaya_pribadi,$harga_biaya_pribadi,
    $tanggal_biaya_pribadi,$jumlah_biaya_pribadi,$bukti_biaya_pribadi,$namagambar)
    
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = BiayaPribadi::find($kode_biaya_pribadi);
     
        $new->nama_biaya_pribadi = $nama_biaya_pribadi;
        $new->satuan_biaya_pribadi = $satuan_biaya_pribadi;
        $new->harga_biaya_pribadi = $harga_biaya_pribadi;
        $new->tanggal_biaya_pribadi=$tanggal_biaya_pribadi;
        $new->jumlah_biaya_pribadi=$jumlah_biaya_pribadi;
        $new->bukti_biaya_pribadi=$bukti_biaya_pribadi;
        $new->bukti_biaya_pribadi=$namagambar;
        $bukti_biaya_pribadi->move("BiayaPribadiBukti",$namagambar);

        $new->save();
    }
    

    function deleteBiayaPribadi($id)
    {
        $ins = BiayaPribadi::find($id);
        $ins->cek_status_biaya_pribadi=0;
        $ins->save();
    }


}
