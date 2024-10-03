<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalBiayaPribadi extends Model
{
    use HasFactory;
    public $table   = "biaya_pribadi";
    public $primaryKey = "kode_biaya_pribadi";
    public $incrementing = false;
    public $timestamps = true;
    function acceptBiayaPribadi($id)
    {
        $ins = ApprovalBiayaPribadi::find($id);
        $ins->cek_approval_biaya_pribadi=1;
        $ins->save();
    }
    function declineBiayaPribadi($id)
    {
        $ins = ApprovalBiayaPribadi::find($id);
        $ins->cek_approval_biaya_pribadi=0;
        $ins->save();
    }
}
