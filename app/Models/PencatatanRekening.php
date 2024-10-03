<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanRekening extends Model
{
    use HasFactory;
    public $table   = "pencatatan_rekening_partner";
    public $primaryKey = "kode_pencatatan_rekening_partner";
    public $incrementing = false;
    public $timestamps = true;

    public function addPencatatanRekening($kode_pencatanan_rekening_partner,$nama_perusahaan_partner,
    $nomor_rekening_perusahaan_partner,$kode_transfer_rekening_perusahaan_partner,
    $nama_bank_perusahaan_partner,$keterangan_pencatatan_rekening_partner)
    {
        $new = new PencatatanRekening();
        $new->kode_pencatanan_rekening_partner = $kode_pencatanan_rekening_partner;
        $new->nama_perusahaan_partner = $nama_perusahaan_partner;
        $new->nomor_rekening_perusahaan_partner = $nomor_rekening_perusahaan_partner;
        $new->kode_transfer_rekening_perusahaan_partner = $kode_transfer_rekening_perusahaan_partner;
        $new->nama_bank_perusahaan_partner=$nama_bank_perusahaan_partner;
        $new->keterangan_pencatatan_rekening_partner=$keterangan_pencatatan_rekening_partner;
        $new->cek_status_pencatatanrekening=1;
        $new->save();
    }

    function getPencatatanRekeningById($id)
    {
        $dt =  PencatatanRekening::where('kode_pencatatan_rekening_partner', '=', $id)
            ->get();
        return $dt;
    }

    function updatePencatatanRekening($kode_pencatanan_rekening_partner,$nama_perusahaan_partner,
    $nomor_rekening_perusahaan_partner,$kode_transfer_rekening_perusahaan_partner,
    $nama_bank_perusahaan_partner,$keterangan_pencatatan_rekening_partner)
    
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = PencatatanRekening::find($kode_pencatanan_rekening_partner);
        // $ins->id_pegawai_gaji = $id_pegawai_gaji;
  
        $new->nama_perusahaan_partner = $nama_perusahaan_partner;
        $new->nomor_rekening_perusahaan_partner = $nomor_rekening_perusahaan_partner;
        $new->kode_transfer_rekening_perusahaan_partner = $kode_transfer_rekening_perusahaan_partner;
        $new->nama_bank_perusahaan_partner=$nama_bank_perusahaan_partner;
        $new->keterangan_pencatatan_rekening_partner=$keterangan_pencatatan_rekening_partner;
        $new->cek_status_pencatatanrekening=1;
        $new->save();
    }
    

    function deletePencatatanrekening($id)
    {
        $ins = PencatatanRekening::find($id);
        $ins->cek_status_pencatatanrekening=0;
        $ins->save();
    }
}
