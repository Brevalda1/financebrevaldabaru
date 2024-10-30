<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\DetailBiayaOperationalProyek;

class detailbiayaoperationalproyekController extends Controller
{
    public function Detailbiayaoperationalproyekform($id){

        $namadatapegawai= DB::select("select * from detail_biaya_operational_proyek where fk_header_biaya_operational = '$id'");
        $lempar=count($namadatapegawai)+1;

        $param["kode"]=$id.'_detail_'.$lempar;

        $param["ids"]=$id;
        return view("detailbiayaoperationalproyek.formbiayaoperationalproyek",$param);
        // echo $id;
    }
    public function Detailbiayaoperationalproyekinsert(Request $req,$id){
        // $param['kodeperus']=$id;
        // echo $id;
        $budget = DB::select("select budget_biaya_operational_proyek as b from header_biaya_operational_proyek where kode_biaya_operational_proyek = '$id'");
        $sum= DB::select("select SUM(db.harga_detail_biaya_operational_proyek) as a from detail_biaya_operational_proyek db where db.fk_header_biaya_operational='$id' and cek_status_detail_biaya_operational_proyek=1 and cek_approval_detail_biaya_operational_proyek = 1");
        $param['budget']=number_format($budget[0]->b);
    
        $param['sum']=number_format($sum[0]->a);
        $form_harga_detail_biaya_operational_proyek =$req->form_harga_detail_biaya_operational_proyek;
        $jumlah = $sum[0]->a+$form_harga_detail_biaya_operational_proyek;
// echo number_format($sum[0]->a),number_format($budget[0]->b);
        if($sum[0]->a > $budget[0]->b || $form_harga_detail_biaya_operational_proyek >=$budget[0]->b){
     
        $form_kode_biaya_detail_operational_proyek = $req->form_kode_biaya_detail_operational_proyek;
        $form_nama_biaya_detail_operational_proyek =$req->form_nama_biaya_detail_operational_proyek;
        $form_jumlah_detail_biaya_operational_proyek =$req->form_jumlah_detail_biaya_operational_proyek;
        $form_harga_detail_biaya_operational_proyek =$req->form_harga_detail_biaya_operational_proyek;
        $form_bukti_detail_biaya_operational_proyek =$req->form_bukti_detail_biaya_operational_proyek;
        $namagambar = $form_bukti_detail_biaya_operational_proyek->getClientOriginalName();
        $form_fk_header_biaya_operational = $req->form_fk_header_biaya_operational;

        $new = new DetailBiayaOperationalProyek();
        $new->kode_biaya_detail_operational_proyek = $form_kode_biaya_detail_operational_proyek;
        $new->nama_biaya_detail_biaya_operational_proyek	 = $form_nama_biaya_detail_operational_proyek;
        $new->jumlah_detail_biaya_operational_proyek=$form_jumlah_detail_biaya_operational_proyek;
        $new->harga_detail_biaya_operational_proyek = $form_harga_detail_biaya_operational_proyek;
        $new->bukti_detail_biaya_operational_proyek = $form_bukti_detail_biaya_operational_proyek;
        $new->bukti_detail_biaya_operational_proyek=$namagambar;
        $form_bukti_detail_biaya_operational_proyek->move("DetailBiayaOperationalProyek",$namagambar);


        $new->cek_status_detail_biaya_operational_proyek=1;
        $new->cek_approval_detail_biaya_operational_proyek=2;
        $new->fk_header_biaya_operational = $form_fk_header_biaya_operational;
  
        $new->save();
        return redirect('/biayaoperationalproyek');
       
        }else{
            
            $form_kode_biaya_detail_operational_proyek = $req->form_kode_biaya_detail_operational_proyek;
            $form_nama_biaya_detail_operational_proyek =$req->form_nama_biaya_detail_operational_proyek;
            $form_jumlah_detail_biaya_operational_proyek =$req->form_jumlah_detail_biaya_operational_proyek;
            $form_harga_detail_biaya_operational_proyek =$req->form_harga_detail_biaya_operational_proyek;
            $form_bukti_detail_biaya_operational_proyek =$req->form_bukti_detail_biaya_operational_proyek;
            $namagambar = $form_bukti_detail_biaya_operational_proyek->getClientOriginalName();
            $form_fk_header_biaya_operational = $req->form_fk_header_biaya_operational;
    
            $new = new DetailBiayaOperationalProyek();
            $new->kode_biaya_detail_operational_proyek = $form_kode_biaya_detail_operational_proyek;
            $new->nama_biaya_detail_biaya_operational_proyek	 = $form_nama_biaya_detail_operational_proyek;
            $new->jumlah_detail_biaya_operational_proyek=$form_jumlah_detail_biaya_operational_proyek;
            $new->harga_detail_biaya_operational_proyek = $form_harga_detail_biaya_operational_proyek;
            $new->bukti_detail_biaya_operational_proyek = $form_bukti_detail_biaya_operational_proyek;
            $new->bukti_detail_biaya_operational_proyek=$namagambar;
            $form_bukti_detail_biaya_operational_proyek->move("DetailBiayaOperationalProyek",$namagambar);
    
    
            $new->cek_status_detail_biaya_operational_proyek=1;
            $new->cek_approval_detail_biaya_operational_proyek=1;
            $new->fk_header_biaya_operational = $form_fk_header_biaya_operational;
      
            $new->save();
            return redirect('/biayaoperationalproyek');
        }


        // $form_kode_biaya_detail_operational_proyek = $req->form_kode_biaya_detail_operational_proyek;
        // $form_nama_biaya_detail_operational_proyek =$req->form_nama_biaya_detail_operational_proyek;
        // $form_jumlah_detail_biaya_operational_proyek =$req->form_jumlah_detail_biaya_operational_proyek;
        // $form_harga_detail_biaya_operational_proyek =$req->form_harga_detail_biaya_operational_proyek;
        // $form_bukti_detail_biaya_operational_proyek =$req->form_bukti_detail_biaya_operational_proyek;
        // $namagambar = $form_bukti_detail_biaya_operational_proyek->getClientOriginalName();
        // $form_fk_header_biaya_operational = $req->form_fk_header_biaya_operational;

        // $new = new DetailBiayaOperationalProyek();
        // $new->kode_biaya_detail_operational_proyek = $form_kode_biaya_detail_operational_proyek;
        // $new->nama_biaya_detail_biaya_operational_proyek	 = $form_nama_biaya_detail_operational_proyek;
        // $new->jumlah_detail_biaya_operational_proyek=$form_jumlah_detail_biaya_operational_proyek;
        // $new->harga_detail_biaya_operational_proyek = $form_harga_detail_biaya_operational_proyek;
        // $new->bukti_detail_biaya_operational_proyek = $form_bukti_detail_biaya_operational_proyek;
        // $new->bukti_detail_biaya_operational_proyek=$namagambar;
        // $form_bukti_detail_biaya_operational_proyek->move("DetailBiayaOperationalProyek",$namagambar);


        // $new->cek_status_detail_biaya_operational_proyek=1;
        // $new->cek_approval_detail_biaya_operational_proyek=1;
        // $new->fk_header_biaya_operational = $form_fk_header_biaya_operational;
  
        // $new->save();
        // return redirect('/biayaoperationalproyek');
        // return to_route('/detailbiayaoperationalproyeka', ['id' => $form_fk_header_biaya_operational]);
        // return view("detailbiayaoperationalproyek.showbiayaoperationalproyek",$form_bukti_detail_biaya_operational_proyek);

}

public function Detailbiayaoperationalproyekselect(Request $request, $id)
{
    // Assign the project code
    $param['kodeperus'] = $id;
    
    // Get search input from the request
    $search = $request->input('search');
    
    // Build the query
    $query = DB::table('detail_biaya_operational_proyek')
        ->where('fk_header_biaya_operational', $id)
        ->where('cek_status_detail_biaya_operational_proyek', 1)
        ->where('cek_approval_detail_biaya_operational_proyek', 1)
        ->orderBy('created_at', 'desc');

    // Apply search filters if search input is provided
    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('kode_biaya_detail_operational_proyek', 'like', "%$search%")
              ->orWhere('nama_biaya_detail_biaya_operational_proyek', 'like', "%$search%")
              ->orWhere('jumlah_detail_biaya_operational_proyek', 'like', "%$search%")
              ->orWhere('harga_detail_biaya_operational_proyek', 'like', "%$search%")
              ->orWhere('approved_by_detail_biaya_operational_proyek', 'like', "%$search%");
        });
    }

    // Paginate the results
    $datas = $query->paginate(10); // Adjust the number per page as needed

    // Get budget and sum
    $budget = DB::table('header_biaya_operational_proyek')
        ->where('kode_biaya_operational_proyek', $id)
        ->value('budget_biaya_operational_proyek');

    $sum = DB::table('detail_biaya_operational_proyek')
        ->where('fk_header_biaya_operational', $id)
        ->where('cek_approval_detail_biaya_operational_proyek', 1)
        ->where('cek_status_detail_biaya_operational_proyek', 1)
        ->sum('harga_detail_biaya_operational_proyek');

    // Format budget and sum
    $param['budget'] = number_format($budget);
    $param['sum'] = number_format($sum);
    $param['datas'] = $datas;
    $param['search'] = $search;

    return view("detailbiayaoperationalproyek.showbiayaoperationalproyek", $param);
}



public function Detailbiayaoperationalproyekedit($no,$kode)
{
  
    $new = new DetailBiayaOperationalProyek();
    // $barang = new Barang();
    $arrBarang = $new->getDetailbiayaoperationalproyekById($no);
    foreach ($arrBarang as $dt) {
        $data['kode_biaya_detail_operational_proyek'] = $dt->kode_biaya_detail_operational_proyek;
        $data['nama_biaya_detail_biaya_operational_proyek'] = $dt->nama_biaya_detail_biaya_operational_proyek	;
        $data['jumlah_detail_biaya_operational_proyek'] = $dt->jumlah_detail_biaya_operational_proyek;
        $data['harga_detail_biaya_operational_proyek'] = $dt->harga_detail_biaya_operational_proyek;
        $data['bukti_detail_biaya_operational_proyek'] = $dt->bukti_detail_biaya_operational_proyek;

    }
    $data['kode_biaya_detail_operational_proyek'] = $no;
    $data['kodeperus']=$kode;
    return view('detailbiayaoperationalproyek.editbiayaoperationalproyek', $data);

}

public function Detailbiayaoperationalproyekupdate(Request $req){


    $form_bukti_detail_biaya_operational_proyek =$req->form_bukti_detail_biaya_operational_proyek;
    $namagambar = $form_bukti_detail_biaya_operational_proyek->getClientOriginalName();

    $new = new DetailBiayaOperationalProyek();
    $new->updateDetailbiayaoperationalproyek($req->form_kode_biaya_detail_operational_proyek,
    $req->form_nama_biaya_detail_operational_proyek,
    $req->form_jumlah_detail_biaya_operational_proyek,
    $req->form_harga_detail_biaya_operational_proyek,
    $req->form_bukti_detail_biaya_operational_proyek,
    $namagambar


    );

return back();
}

public function Detailbiayaoperationalproyekdelete($no)
{
    $gaji= new DetailBiayaOperationalProyek();
    $gaji->deleteDetailbiayaoperationalproyek($no);
    return back();

    // if(session()->get("jenis")=="ADMIN"){
    //     return redirect('/admin/listbarang');
    // } else{
    //     return redirect('/owner/listbarang');
    // }
}
}
