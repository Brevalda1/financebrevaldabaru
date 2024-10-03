<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaOperationalNonBudgeting extends Model
{
    use HasFactory;
    public $table   = "biaya_operational_non_budgeting";
    public $primaryKey = "kode_operational_non_budgeting";
    public $incrementing = false;
    public $timestamps = true;

    public function addBiayaOperationalNonBudgeting($kode_operational_non_budgeting,$nama_operational_non_budgeting,
    $keterangan_operational_non_budgeting,
    $tanggal_operational_non_budgeting,$biaya_operational_non_budgeting)
    {
        $new = new BiayaOperationalNonBudgeting();
        $new->kode_operational_non_budgeting = $kode_operational_non_budgeting;
        $new->nama_operational_non_budgeting = $nama_operational_non_budgeting;
        $new->keterangan_operational_non_budgeting = $keterangan_operational_non_budgeting;
        $new->tanggal_operational_non_budgeting=$tanggal_operational_non_budgeting;
        $new->biaya_operational_non_budgeting=$biaya_operational_non_budgeting;
        $new->cek_status_operational_non_budgeting=1;
        $new->save();
    }

    function getBiayaOperationalNonBudgetingById($id)
    {
        $dt =  BiayaOperationalNonBudgeting::where('kode_operational_non_budgeting', '=', $id)
            ->get();
        return $dt;
    }

    function updateBiayaOperationalNonBudgeting($kode_operational_non_budgeting,$nama_operational_non_budgeting,
    $keterangan_operational_non_budgeting,
    $tanggal_operational_non_budgeting,$biaya_operational_non_budgeting)
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = BiayaOperationalNonBudgeting::find($kode_operational_non_budgeting);

        $new->kode_operational_non_budgeting = $kode_operational_non_budgeting;
        $new->nama_operational_non_budgeting = $nama_operational_non_budgeting;
        $new->keterangan_operational_non_budgeting = $keterangan_operational_non_budgeting;
        $new->tanggal_operational_non_budgeting=$tanggal_operational_non_budgeting;
        $new->biaya_operational_non_budgeting=$biaya_operational_non_budgeting;

        $new->save();
    }
    

    function deleteBiayaOperationalNonBudgeting($id)
    {
        $ins = BiayaOperationalNonBudgeting::find($id);
        $ins->cek_status_operational_non_budgeting=0;
        $ins->save();
    }

}
