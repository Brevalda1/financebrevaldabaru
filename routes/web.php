<?php
use App\Http\Controllers\gajipegawaiController;
use App\Http\Controllers\pencatatanrekeningController;
use App\Http\Controllers\pencatatanmasadepanController;
use App\Http\Controllers\biayaoperationalproyekController;
use App\Http\Controllers\biayaoperationalnonbudgetingController;
use App\Http\Controllers\biayapribadiController;
use App\Http\Controllers\biayalainlainController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\detailbiayaoperationalproyekController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\manajemenperusahaanController;
use App\Http\Controllers\approvalbiayaproyekController;
use App\Http\Controllers\approvalbiayapribadiController;
use App\Http\Controllers\reportoperationalController;
use App\Http\Controllers\reportopertionalController;
use App\Http\Controllers\reporbiayapribadiController;
use App\Http\Controllers\reporbiayalainlainController;
use App\Http\Controllers\reporbiayaoperationalproyekController;
use App\Http\Controllers\reportdetailbiayaoperationalproyekController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('formbiayaoperationalproyek');
// });


// Route::get("/", [gajipegawaiController::class,"Gajipegawai"]);
Route::get("/", [loginController::class,"Login"]);
Route::get("/logout", [loginController::class,"Logout"]);
// Route::get("/", [gajipegawaiController::class,"Gajipegawaiselect"]);
Route::get("/gajipegawai", [gajipegawaiController::class,"Gajipegawaiselect"]);

Route::get("/users",[loginController::class,"Userss"]);
Route::post("/",[loginController::class,"Plogin"]);
Route::get("/gajipegawaiform", [gajipegawaiController::class,"Gajipegawaiform"]);
Route::get("/updategajipegawaiform/{no}", [gajipegawaiController::class,"Gajipegawaiedit"]);
Route::get("/deletegajipegawaiform/{no}", [gajipegawaiController::class,"Gajipegawaidelete"]);
Route::post("/updategajipegawaiform/{no}", [gajipegawaiController::class,"GajiPegawaiupdate"]);
Route::post("/gajipegawaiform", [gajipegawaiController::class,"Gajipegawaiinsert"]);

Route::get("/pencatatanrekening", [pencatatanrekeningController::class,"Pencatatanrekeningselect"]);
Route::get("/pencatatanrekeningform", [pencatatanrekeningController::class,"Pencatatanrekeningform"]);
Route::post("/pencatatanrekeningform", [pencatatanrekeningController::class,"Pencatatanrekeninginsert"]);
Route::get("/deletepencatatanrekeningform/{no}", [pencatatanrekeningController::class,"Pencatatanrekeningdelete"]);
Route::get("/updatepencatatanrekeningform/{no}", [pencatatanrekeningController::class,"PencatatanRekeningedit"]);
Route::post("/updatepencatatanrekeningform/{no}", [pencatatanrekeningController::class,"Pencatatanrekeningupdate"]);

Route::get("/pencatatanmasadepan", [pencatatanmasadepanController::class,"Pencatatanmasadepanselect"]);
Route::get("/pencatatanmasadepanform", [pencatatanmasadepanController::class,"Pencatatanmasadepanform"]);
Route::post("/pencatatanmasadepanform", [pencatatanmasadepanController::class,"Pencatatanmasadepaninsert"]);
Route::get("/updatepencatatanmasadepanform/{no}", [pencatatanmasadepanController::class,"Pencatatanmasadepanedit"]);
Route::post("/updatepencatatanmasadepanform/{no}", [pencatatanmasadepanController::class,"Pencatatanmasadepanupdate"]);
Route::get("/deletepencatatanmasadepanform/{no}", [pencatatanmasadepanController::class,"Pencatatanmasadepandelete"]);

Route::get("/biayapribadi", [biayapribadiController::class,"Biayapribadiselect"]);
Route::get("/biayapribadiform", [biayapribadiController::class,"Biayapribadiform"]);
Route::post("/biayapribadiform", [biayapribadiController::class,"Biayapribadiinsert"]);
Route::get("/updatebiayapribadiform/{no}", [biayapribadiController::class,"Biayapribadiedit"]);
Route::post("/updatebiayapribadiform/{no}", [biayapribadiController::class,"Biayapribadiupdate"]);
Route::get("/deletebiayapribadiform/{no}", [biayapribadiController::class,"Biayapribadidelete"]);

Route::get("/biayaoperationalproyek", [biayaoperationalproyekController::class,"Biayaoperationalproyekselect"]);
Route::get("/biayaoperationalproyeka", [biayaoperationalproyekController::class,"Biayaoperationalproyekselecta"]);
Route::get("/biayaoperationalproyekform", [biayaoperationalproyekController::class,"Biayaoperationalproyekform"]);
Route::post("/biayaoperationalproyekform", [biayaoperationalproyekController::class,"Biayaoperationalproyekinsert"]);
Route::get("/updatebiayaoperationalproyekform/{no}", [biayaoperationalproyekController::class,"Biayaoperationalproyekedit"]);
Route::post("/updatebiayaoperationalproyekform/{no}", [biayaoperationalproyekController::class,"Biayaoperationalproyekupdate"]);
Route::get("/deletebiayaoperationalproyekform/{no}", [biayaoperationalproyekController::class,"Biayaoperationalproyekdelete"]);

Route::get("/biayaoperationalnonbudgeting", [biayaoperationalnonbudgetingController::class,"Biayaoperationalnonbudgetingselect"]);
Route::get("/biayaoperationalnonbudgetingform", [biayaoperationalnonbudgetingController::class,"Biayaoperationalnonbudgetingform"]);
Route::post("/biayaoperationalnonbudgetingform", [biayaoperationalnonbudgetingController::class,"Biayaoperationalnonbudgetinginsert"]);
Route::get("/updatebiayaoperationalnonbudgetingform/{no}", [biayaoperationalnonbudgetingController::class,"Biayaoperationalnonbudgetingedit"]);
Route::post("/updatebiayaoperationalnonbudgetingform/{no}", [biayaoperationalnonbudgetingController::class,"Biayaoperationalnonbudgetingupdate"]);
Route::get("/deletebiayaoperationalnonbudgetingform/{no}", [biayaoperationalnonbudgetingController::class,"Biayaoperationalnonbudgetingdelete"]);


Route::get("/biayalainlain", [biayalainlainController::class,"Biayalainlainselect"]);
Route::get("/biayalainlainform", [biayalainlainController::class,"Biayalainlainform"]);
Route::post("/biayalainlainform", [biayalainlainController::class,"Biayalainlaininsert"]);
Route::get("/updatebiayalainlainform/{no}", [biayalainlainController::class,"Biayalainlainedit"]);
Route::post("/updatebiayalainlainform/{no}", [biayalainlainController::class,"Biayalainlainupdate"]);
Route::get("/deletebiayalainlainform/{no}", [biayalainlainController::class,"Biayalainlaindelete"]);

Route::get("/detailbiayaoperationalproyeka", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekselect"]);
Route::get("/detailbiayaoperationalproyeka/{no}", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekselect"]);
Route::get("/detailbiayaoperationalproyekform/{no}", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekform"]);
Route::post("/detailbiayaoperationalproyekform/{no}", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekinsert"]);
Route::get("/updatedetailbiayaoperationalproyekform/{no}/{kode}", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekedit"]);
Route::post("/updatedetailbiayaoperationalproyekform/{no}", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekupdate"]);
Route::get("/deletedetailbiayaoperationalproyekform/{no}", [detailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekdelete"]);

Route::get("/pegawai", [pegawaiController::class,"Pegawaiselect"]);
Route::get("/pegawaiform", [pegawaiController::class,"Pegawaiform"]);
Route::post("/pegawaiform", [pegawaiController::class,"Pegawaiinsert"]);
Route::get("/updatepegawaiform/{no}", [pegawaiController::class,"Pegawaiedit"]);
Route::post("/updatepegawaiform/{no}", [pegawaiController::class,"pegawaiupdate"]);
Route::get("/deletepegawaiform/{no}", [pegawaiController::class,"pegawaidelete"]);


Route::get("/manajemenperusahaan", [manajemenperusahaanController::class,"ManajemenPerusahaanselect"]);
Route::get("/manajemenperusahaanform", [manajemenperusahaanController::class,"ManajemenPerusahaanform"]);
Route::post("/manajemenperusahaanform", [manajemenperusahaanController::class,"ManajemenPerusahaaninsert"]);
Route::get("/updatemanajemenperusahaanform/{no}", [manajemenperusahaanController::class,"ManajemenPerusahaanedit"]);
Route::post("/updatemanajemenperusahaanform/{no}", [manajemenperusahaanController::class,"ManajemenPerusahaanupdate"]);
Route::get("/deletemanajemenperusahaanform/{no}", [manajemenperusahaanController::class,"ManajemenPerusahaandelete"]);

Route::get("/approvalbiayaproyek", [approvalbiayaproyekController::class,"Approvalbiayaoperationalproyekselect"]);
Route::get("/approvalbiayaproyekformaccept/{no}", [approvalbiayaproyekController::class,"Approvalbiayaoperationalproyekaccept"]);
Route::get("/approvalbiayaproyekformdecline/{no}", [approvalbiayaproyekController::class,"Approvalbiayaoperationalproyekdecline"]);
Route::get("/approvalbiayaproyekformdetail/{no}", [approvalbiayaproyekController::class,"Approvalbiayaoperationalproyekdetail"]);

Route::get("/approvalbiayapribadi", [approvalbiayapribadiController::class,"Approvalbiayapribadiselect"]);
Route::get("/approvalbiayapribadiformaccept/{no}", [approvalbiayapribadiController::class,"Approvalbiayapribadiaccept"]);
Route::get("/approvalbiayapribadiformdecline/{no}", [approvalbiayapribadiController::class,"Approvalbiayapribadidecline"]);
Route::get("/approvalbiayapribadiformdetail/{no}", [approvalbiayapribadiController::class,"Approvalbiayapribadidetail"]);

Route::get("/reportoperational", [reportopertionalController::class,"Reportselect"]);
Route::get("/reportbiayapribadi", [reporbiayapribadiController::class,"Reportselect"]);
Route::get("/reportbiayalainlain", [reporbiayalainlainController::class,"Reportselect"]);
Route::get("/reportbiayaoperationalproyek", [reporbiayaoperationalproyekController::class,"Reportselect"]);

Route::get("/reportdetailbiayaoperationalproyeka/{no}", [reportdetailbiayaoperationalproyekController::class,"Detailbiayaoperationalproyekselect"]);

Route::get('/downloadreportoperational', [reportopertionalController::class, 'downloadReport'])->name('downloadReport');
Route::get('/downloadreportbiayapribadi', [reporbiayapribadiController::class, 'generatePDF']);
Route::get('/downloadreportbiayalainlain', [reporbiayalainlainController::class, 'generatePDF']);
Route::get('/downloadreportdetailbiayaoperationalproyek/{no}', [reportdetailbiayaoperationalproyekController::class, 'generatePDF']);
