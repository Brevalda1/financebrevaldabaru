<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    public $table   = "pegawai";
    public $primaryKey = "username";
    public $incrementing = false;
    public $timestamps = true;
 
    public function add($username,$password,$nama_pegawai,$role,$Nomor_telp_pegawai,$jabatan_pegawai,$kode_perusahaan)
    {
        $new = new Pegawai();
        $new->username = $username;
        $new->password = $password;
        $new->nama_pegawai = $nama_pegawai;
        $new->role = $role;
        $new->nomor_telp_pegawai = $Nomor_telp_pegawai;
        $new->jabatan_pegawai=$jabatan_pegawai;
        $new->cek_status_pegawai=1;
        $new->kode_perusahaan=$kode_perusahaan;
        $new->save();
    }
    function getPegawaiById($id)
    {
        $dt =  Pegawai::where('username', '=', $id)
            ->get();
        return $dt;
    }

    function updatePegawai($username,$password,$nama_pegawai,$role,$nomor_telp_pegawai,$jabatan_pegawai,$kode_perusahaan)
    
    {
        // dd($nomor_ktp_pegawai_gaji);
        $new = Pegawai::find($username);
        // $ins->id_pegawai_gaji = $id_pegawai_gaji;
        $new->username = $username;
        $new->password = $password;
        $new->nama_pegawai = $nama_pegawai;
        $new->role = $role;
        $new->nomor_telp_pegawai = $nomor_telp_pegawai;
        $new->jabatan_pegawai=$jabatan_pegawai;
        $new->kode_perusahaan=$kode_perusahaan;
      
        $new->save();
    }

    function deletePegawai($id)
    {
        $ins = Pegawai::find($id);
        $ins->cek_status_pegawai = 0;
        $ins->save();
    }

    
}
