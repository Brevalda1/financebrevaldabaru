<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanMasadepan extends Model
{
    use HasFactory;
    public $table   = "pencatatan_biaya_untuk_masa_depan";
    public $primaryKey = "kode_pencatatan_biaya_masa_depan";
    public $incrementing = false;
    public $timestamps = true;

    public function addPencatatanMasadepan($kode_pencatatan_biaya_masa_depan,$nama_pencatatan_biaya_masa_depan,
    $jumlah_pencatatan_biaya_masa_depan,$harga_pencatatan_biaya_masa_depan,
    $keterangan_pencatatan_biaya_masa_depan)
    {
        $new = new PencatatanMasadepan();
        $new->kode_pencatatan_biaya_masa_depan = $kode_pencatatan_biaya_masa_depan;
        $new->nama_pencatatan_biaya_masa_depan = $nama_pencatatan_biaya_masa_depan;
        $new->jumlah_pencatatan_biaya_masa_depan = $jumlah_pencatatan_biaya_masa_depan;
        $new->harga_pencatatan_biaya_masa_depan = $harga_pencatatan_biaya_masa_depan;
        $new->keterangan_pencatatan_biaya_masa_depan=$keterangan_pencatatan_biaya_masa_depan;
        $new->cek_status_pencatatan_biaya_masa_depan=1;
        $new->save();
    }
    function getPencatatanMasadepanById($id)
    {
        $dt =  PencatatanMasadepan::where('kode_pencatatan_biaya_masa_depan', '=', $id)
            ->get();
        return $dt;
    }

    function updatePencatatanMasadepan($kode_pencatatan_biaya_masa_depan,$nama_pencatatan_biaya_masa_depan,
    $jumlah_pencatatan_biaya_masa_depan,$harga_pencatatan_biaya_masa_depan,
    $keterangan_pencatatan_biaya_masa_depan)
    
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = PencatatanMasadepan::find($kode_pencatatan_biaya_masa_depan);
        // $ins->id_pegawai_gaji = $id_pegawai_gaji;
  
        $new->nama_pencatatan_biaya_masa_depan = $nama_pencatatan_biaya_masa_depan;
        $new->jumlah_pencatatan_biaya_masa_depan = $jumlah_pencatatan_biaya_masa_depan;
        $new->harga_pencatatan_biaya_masa_depan = $harga_pencatatan_biaya_masa_depan;
        $new->keterangan_pencatatan_biaya_masa_depan=$keterangan_pencatatan_biaya_masa_depan;

        $new->save();
    }
    

    function deletePencatatanMasadepan($id)
    {
        $ins = PencatatanMasadepan::find($id);
        $ins->cek_status_pencatatan_biaya_masa_depan=0;
        $ins->save();
    }

}