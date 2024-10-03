<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
use App\Models\Users;

class loginController extends Controller
{
    public function Login(){
        return view("login");
    }
    public function Userss(){
     

        // $pass = Hash::make("123");

 
        // $new = new Pegawai();
        // //$new->add($nama,$username,$email,$pass,$stat);
        // $new->Username = "bre";
        // $new->password = $pass;
    
        // $new->save();
      
    }
    public function Logout(Request $req){
        session()->flush();
        return redirect('/');

    }
    public function Plogin(Request $req)
    {
        if($req->input('usernamee') == "admin" && $req->input('pass') == "admin"){
            session()->put('login',"admin");
            return redirect("/gajipegawai");
            //echo($req->input("username"));
        }
        else {
            $data = DB::select("select * from pegawai");
            foreach ($data as $key) {
                // if(($key->username == $req->input('usernamee'))&& password_verify($req->input('pass'),$key->password)){
                //     // if(($key->username == $req->usernamee)&& password_verify($req->input('pass'),$key->password))
                //     $users = $key->username;
                //     session()->put('login',$users);
                //     echo("tes");
                //     // return redirect('/');
                   
                // }
                if($req->input('usernamee') ==  $key->username && password_verify($req->input('pass'),$key->password)){
                    $role=$key->role;
                    session()->put('role',$role);
                    $users = ["username"=>$key->username,"kode_perusahaan"=>$key->kode_perusahaan];
                    session()->put('login',$users);
                    //  dd($users);
                    return redirect('/gajipegawai');
                }
            }

        }
    }
   

}
