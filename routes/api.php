<?php

use App\Http\Controllers\API\SilsilahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('semua-anak-budi', [SilsilahController::class, 'semua_anak_budi']);
Route::get('cucu-budi', [SilsilahController::class, 'cucu_budi']);
Route::get('cucu-perempuan-budi', [SilsilahController::class, 'cucu_perempuan_budi']);
Route::get('bibi-farah', [SilsilahController::class, 'bibi_farah']);
Route::get('sepupu-laki-laki-hani', [SilsilahController::class, 'sepupu_laki_laki_hani']);

//crud
Route::post('tambah-cucu', [SilsilahController::class, 'tambah_cucu']);
Route::put('update-cucu/{id}', [SilsilahController::class, 'update_cucu']);
Route::delete('delete-cucu/{id}', [SilsilahController::class, 'hapus_cucu']);
