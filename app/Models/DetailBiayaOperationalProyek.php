<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBiayaOperationalProyek extends Model
{
    use HasFactory;
    public $table   = "detail_biaya_operational_proyek";
    public $primaryKey = "kode_biaya_detail_operational_proyek";
    public $incrementing = true;
    public $timestamps = true;

    public function addDetailBiayaOperationalProyek($kode_biaya_detail_operational_proyek,
    $nama_biaya_detail_biaya_operational_proyek	,$jumlah_detail_operational_proyek,
    $harga_detail_biaya_operational_proyek,
    $bukti_detail_biaya_operational_proyek)
    {
        $new = new DetailBiayaOperationalProyek();
        $new->kode_biaya_detail_operational_proyek = $kode_biaya_detail_operational_proyek;
        $new->nama_biaya_detail_biaya_operational_proyek = $nama_biaya_detail_biaya_operational_proyek	;
        $new->jumlah_detail_operational_proyek=$jumlah_detail_operational_proyek;
        $new->harga_detail_biaya_operational_proyek = $harga_detail_biaya_operational_proyek;
        $new->bukti_detail_biaya_operational_proyek=$bukti_detail_biaya_operational_proyek;
        $new->cek_status_detail_biaya_operational_proyek=1;
        $new->save();
    }

    function getDetailBiayaOperationalProyekById($id)
    {
        $dt =  DetailBiayaOperationalProyek::where('kode_biaya_detail_operational_proyek', '=', $id)
            ->get();
        return $dt;
    }

    function updateDetailBiayaOperationalProyek($kode_biaya_detail_operational_proyek,
    $nama_biaya_detail_operational_proyek,$jumlah_detail_operational_proyek,
    $harga_detail_biaya_operational_proyek,
    $bukti_detail_biaya_operational_proyek,$namagambar)
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = DetailBiayaOperationalProyek::find($kode_biaya_detail_operational_proyek);
        $new->nama_biaya_detail_biaya_operational_proyek = $nama_biaya_detail_operational_proyek;
        $new->jumlah_detail_biaya_operational_proyek=$jumlah_detail_operational_proyek;
        $new->harga_detail_biaya_operational_proyek = $harga_detail_biaya_operational_proyek;
        $new->bukti_detail_biaya_operational_proyek=$bukti_detail_biaya_operational_proyek;
        $new->bukti_detail_biaya_operational_proyek=$namagambar;
        $bukti_detail_biaya_operational_proyek->move("DetailBiayaOperationalProyek",$namagambar);
        $new->save();
    }
    

    function deleteDetailbiayaoperationalproyek($id)
    {
        $ins = DetailBiayaOperationalProyek::find($id);
        $ins->cek_status_detail_biaya_operational_proyek=0;
        $ins->save();
    }

}
