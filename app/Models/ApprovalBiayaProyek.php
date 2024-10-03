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

    function acceptDetailbiayaoperationalproyek($id)
    {
        $ins = ApprovalBiayaProyek::find($id);
        $ins->cek_approval_detail_biaya_operational_proyek=1;
        $ins->save();
    }
    function declineDetailbiayaoperationalproyek($id)
    {
        $ins = ApprovalBiayaProyek::find($id);
        $ins->cek_approval_detail_biaya_operational_proyek=0;
        $ins->save();
    }
}
