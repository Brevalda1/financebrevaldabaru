<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalBiayaProyek extends Model
{
    use HasFactory;
    public $table   = "detail_biaya_operational_proyek";
    public $primaryKey = "kode_biaya_detail_operational_proyek";
    public $incrementing = true;
    public $timestamps = true;

    function acceptDetailbiayaoperationalproyek($id,$nama)
    {
        $ins = ApprovalBiayaProyek::find($id);
        $ins->cek_approval_detail_biaya_operational_proyek=1;
        $ins->approved_by_detail_biaya_operational_proyek=$nama;
        $ins->save();
    }
    function declineDetailbiayaoperationalproyek($id)
    {
        $ins = ApprovalBiayaProyek::find($id);
        $ins->cek_approval_detail_biaya_operational_proyek=0;
        $ins->save();
    }
    function detailDetailbiayaoperationalproyek($id)
    {
           $dt =  ApprovalBiayaProyek::where('kode_biaya_detail_operational_proyek', '=', $id)
            ->get();
        return $dt;
    }
}
