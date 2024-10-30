<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\GajiPegawai;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ActionsBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ContextBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\SectionBlock;
use Illuminate\Notifications\Slack\BlockKit\Composites\ConfirmObject;
use Illuminate\Notifications\Slack\SlackMessage;


class gajipegawaiController extends Controller
{
    // public function Gajipegawai(){
    //     return view("showgajipegawai");
    // }
    public function Gajipegawaiform(){
        $sessiondata = Session()->get('login');
       
        $namadatapegawai= DB::select("select * from pegawai_gaji");
        $lempar=count($namadatapegawai)+1;
    
        $kodegajipegawai = $sessiondata['kode_perusahaan']."_GJP_".$lempar;
        $param["kode"]=$kodegajipegawai;
        return view("gajipegawai.formgajipegawai",$param);
    }
   public function Gajipegawaiinsert(Request $req)
{
    $form_id_pegawai_gaji = $req->form_id_pegawai_gaji;
    $form_nomor_ktp_pegawai_gaji = $req->form_nomor_ktp_pegawai_gaji;
    $form_nama_pegawai_gaji = $req->form_nama_pegawai_gaji;
    $form_jumlah_kehadiran_pegawai_gaji = $req->form_jumlah_kehadiran_pegawai_gaji;
    $form_rate_pegawai_gaji = $req->form_rate_pegawai_gaji;
    $form_tambahan_lainlain_pegawai_gaji = $req->form_tambahan_lainlain_pegawai_gaji;
    $form_keterangan_pegawai_gaji = $req->form_keterangan_pegawai_gaji;
    $form_nomor_rekening_pegawai_gaji = $req->form_nomor_rekening_pegawai_gaji;
    $form_nama_bank_pegawai_gaji = $req->form_nama_bank_pegawai_gaji;
    $form_jabatan_pegawai_gaji = $req->form_jabatan_pegawai_gaji;

    // Calculate total on the server side
    $total = ($form_rate_pegawai_gaji * $form_jumlah_kehadiran_pegawai_gaji) + $form_tambahan_lainlain_pegawai_gaji;
    $form_total_pegawai_gaji = $total;

    // Save data to the database
    $new = new GajiPegawai();
    $new->id_pegawai_gaji = $form_id_pegawai_gaji;
    $new->nomor_ktp_pegawai_gaji = $form_nomor_ktp_pegawai_gaji;
    $new->nama_pegawai_gaji = $form_nama_pegawai_gaji;
    $new->jumlah_kehadiran_pegawai_gaji = $form_jumlah_kehadiran_pegawai_gaji;
    $new->rate_pegawai_gaji = $form_rate_pegawai_gaji;
    $new->tambahan_lainlain_pegawai_gaji = $form_tambahan_lainlain_pegawai_gaji;
    $new->keterangan_pegawai_gaji = $form_keterangan_pegawai_gaji;
    $new->total_pegawai_gaji = $form_total_pegawai_gaji;
    $new->jabatan_pegawai_gaji = $form_jabatan_pegawai_gaji;
    $new->nomor_rekening_pegawai_gaji = $form_nomor_rekening_pegawai_gaji;
    $new->nama_bank_pegawai_gaji = $form_nama_bank_pegawai_gaji;
    $new->cek_aktif_gajipegawai = 1;

    $new->save();

    return redirect("/gajipegawai");
}


    public function Gajipegawaiselect(Request $request)
    {
    $sessiondata = Session()->get('login');
    $kodeidpegawaiperus = $sessiondata['kode_perusahaan'];
    //     if(Session::Has('datas')){
    //         $param['datas'] = Session::get('datas');
    //     }
    //     else{
       
    //         // $data = DB::select("select * from pegawai_gaji where cek_aktif_gajipegawai = 1 AND id_pegawai_gaji like '$kodeidpegawai%' order by created_at desc");
    //         $data = DB::table('pegawai_gaji')
    // ->where('cek_aktif_gajipegawai', 1)
    // ->where('id_pegawai_gaji', 'like', "$kodeidpegawai%")
    // ->orderBy('created_at', 'desc')
    // ->paginate(5);
    //         $param['datas'] = $data;
    //         // dd($param['datas']);
            
    //     }
        //ini

    $kodeidpegawai = $request->input('kodeidpegawai'); // Ambil kode pegawai dari input
    $search = $request->input('search'); // Ambil input pencarian

    // Mulai query
    $query = DB::table('pegawai_gaji')
        ->where('cek_aktif_gajipegawai', 1)
        ->where('id_pegawai_gaji', 'like', "$kodeidpegawaiperus%");

    // Tambahkan pencarian jika ada
    if ($search) {
        $query->where('id_pegawai_gaji', 'like', "%$search%")
        ->orWhere('nomor_ktp_pegawai_gaji','like',"%$search%")
        ->orWhere('nama_pegawai_gaji','like',"%$search%")
        ->orWhere('jumlah_kehadiran_pegawai_gaji','like',"%$search%")
        ->orWhere('rate_pegawai_gaji','like',"%$search%")
        ->orWhere('keterangan_pegawai_gaji','like',"%$search%")
        ->orWhere('total_pegawai_gaji','like',"%$search%")
        ->orWhere('jabatan_pegawai_gaji','like',"%$search%")
        ->orWhere('nomor_rekening_pegawai_gaji','like',"%$search%")
        ->orWhere('nama_bank_pegawai_gaji','like',"%$search%"); // Ganti dengan field yang sesuai
    }

    // Ambil data dengan paginasi
    $data = $query->orderBy('created_at', 'desc')->paginate(5);

    // return view('pegawai.index', compact('data', 'search', 'kodeidpegawai'));
        return view("gajipegawai.showgajipegawai",compact('data', 'search', 'kodeidpegawai'));
        
    }
    public function Gajipegawaiedit($no)
    {
        $new = new GajiPegawai();
        $arrBarang = $new->getGajipegawaiById($no);
        foreach ($arrBarang as $dt) {
            $data['id_pegawai_gaji'] = $dt->id_pegawai_gaji;
            $data['nomor_ktp_pegawai_gaji'] = $dt->nomor_ktp_pegawai_gaji;
            $data['nama_pegawai_gaji'] = $dt->nama_pegawai_gaji;
            $data['jumlah_kehadiran_pegawai_gaji'] = $dt->jumlah_kehadiran_pegawai_gaji;
            $data['rate_pegawai_gaji'] = $dt->rate_pegawai_gaji;
            $data['tambahan_lainlain_pegawai_gaji'] = $dt->tambahan_lainlain_pegawai_gaji;
            $data['keterangan_pegawai_gaji'] = $dt->keterangan_pegawai_gaji;
            $data['total_pegawai_gaji'] = $dt->total_pegawai_gaji;
            $data['jabatan_pegawai_gaji'] = $dt->jabatan_pegawai_gaji;
            $data['nomor_rekening_pegawai_gaji'] = $dt->nomor_rekening_pegawai_gaji;
            $data['nama_bank_pegawai_gaji'] = $dt->nama_bank_pegawai_gaji;
        }
        $data['id_pegawai_gaji'] = $no;
        return view('gajipegawai.editgajipegawai', $data);
    }

    public function GajiPegawaiupdate(Request $req)
    {
        // Retrieve input values from the request
        $form_id_pegawai_gaji = $req->form_id_pegawai_gaji;
        $form_nomor_ktp_pegawai_gaji = $req->form_nomor_ktp_pegawai_gaji;
        $form_nama_pegawai_gaji = $req->form_nama_pegawai_gaji;
        $form_jumlah_kehadiran_pegawai_gaji = $req->form_jumlah_kehadiran_pegawai_gaji;
        $form_rate_pegawai_gaji = $req->form_rate_pegawai_gaji;
        $form_tambahan_lainlain_pegawai_gaji = $req->form_tambahan_lainlain_pegawai_gaji;
        $form_keterangan_pegawai_gaji = $req->form_keterangan_pegawai_gaji;
        $form_nomor_rekening_pegawai_gaji = $req->form_nomor_rekening_pegawai_gaji;
        $form_nama_bank_pegawai_gaji = $req->form_nama_bank_pegawai_gaji;
        $form_jabatan_pegawai_gaji = $req->form_jabatan_pegawai_gaji;
    
        // Recalculate the total on the server side
        $total = ($form_rate_pegawai_gaji * $form_jumlah_kehadiran_pegawai_gaji) + $form_tambahan_lainlain_pegawai_gaji;
        $form_total_pegawai_gaji = $total;
    
        // Update the data
        $new = new GajiPegawai();
        $new->updateGajipegawai(
            $form_id_pegawai_gaji,
            $form_nomor_ktp_pegawai_gaji,
            $form_nama_pegawai_gaji,
            $form_jumlah_kehadiran_pegawai_gaji,
            $form_rate_pegawai_gaji,
            $form_tambahan_lainlain_pegawai_gaji,
            $form_keterangan_pegawai_gaji,
            $form_total_pegawai_gaji, // Use recalculated total
            $form_nomor_rekening_pegawai_gaji,
            $form_nama_bank_pegawai_gaji,
            $form_jabatan_pegawai_gaji
        );
    
        return redirect('/gajipegawai');
    }
    
public function GajiPegawaidelete($no)
    {
        $gaji= new GajiPegawai();
        $gaji->deleteGajipegawai($no);
        return redirect('/gajipegawai');

        // if(session()->get("jenis")=="ADMIN"){
        //     return redirect('/admin/listbarang');
        // } else{
        //     return redirect('/owner/listbarang');
        // }
    }
}
