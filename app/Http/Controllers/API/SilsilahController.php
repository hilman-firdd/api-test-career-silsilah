<?php

namespace App\Http\Controllers\API;

use App\Models\Orang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SilsilahController extends Controller
{
    public function semua_anak_budi()
    {
        // $data = Orang::with(['peran_orang:id,peran_orang'])->get();
        $data = \DB::table('orang')
            ->select('orang.nama', 'peran_orang.peran_orang')
            ->where('peran_orang', '=', 'anak_ayah')
            ->join('peran_orang', 'peran_orang.orang_id', '=', 'orang.id')
            ->get();
        return Response()->json(['data' => $data]);
    }

    public function cucu_budi()
    {
        $data = \DB::table('orang')
            ->select('orang.nama', 'peran_orang.peran_orang')
            ->where('peran_orang', '=', 'cucu')
            ->join('peran_orang', 'peran_orang.orang_id', '=', 'orang.id')
            ->get();
        return response()->json(['data' => $data]);
    }

    public function cucu_perempuan_budi()
    {
        $data = \DB::table('orang')
            ->select('orang.nama')
            ->where('peran_orang', '=', 'cucu')
            ->where('orang.jenis_kelamin', '=', 'P')
            ->join('peran_orang', 'peran_orang.orang_id', '=', 'orang.id')
            ->get();
        return response()->json(['data' => $data]);
    }

    public function bibi_farah()
    {
        $data = \DB::table('orang')
            ->select('orang.nama', 'peran_orang.peran_orang as bibi farah')
            ->where('peran_orang.orang_id', '=', '5')
            ->join('peran_orang', 'peran_orang.orang_id', '=', 'orang.id')
            ->get();
        return response()->json(['data' => $data]);
    }

    public function sepupu_laki_laki_hani()
    {
        $data = \DB::table('orang')
            ->select('orang.nama as sepupu-laki-laki-hani')
            ->where('peran_orang.peran_orang', '=', 'cucu')
            ->Where('orang.jenis_kelamin', '=', 'L')
            ->join('peran_orang', 'peran_orang.orang_id', '=', 'orang.id')
            ->get();
        return response()->json(['data' => $data]);
    }

    public function tambah_cucu(Request $request)
    {
        $orang = \DB::table('orang');
        $orang->insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        return response()->json(['sukses' => 'tambah cucu']);
    }

    public function update_cucu(Request $request, $id)
    {
        $orang = Orang::find($id);
        $orang->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        return response()->json(['sukses' => 'edit cucu']);
    }

    public function hapus_cucu($id)
    {
        Orang::find($id)->delete();
        return response()->json(['sukses' => 'delete cucu']);
    }
}
