<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\anggota;

class AnggotaaController extends Controller
{
    public function getDataApi()
    {
        // trycatch spya ttp jalan walau eror dan tau apa erornya
        try {
            $dataApi = anggota::all();

            return response()->json([
                'success' => true,
                'message' => 'Succesfully',
                'data' => $dataApi,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => true,
                'message' => 'Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function getDetail(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required'
            ]);

            $dataApi = anggota::find($request->id);

            return response()->json([
                'success' => true,
                'message' => 'Succesfully',
                'data' => $dataApi,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function Hapus(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required'
            ]);

            $dataApi = anggota::find($request->id);
            $dataApi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Succesfully',

            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function Tambah(Request $request)
    {

        try {
            $request->validate([
                'nama' => 'required',
                'nim' => 'required',
                'alamat' => 'required',
                'asal' => 'required',
            ]);

            anggota::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Succesfully',

            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function Edit(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'nim' => 'required',
                'alamat' => 'required',
                'asal' => 'required',
            ]);

            $anggota = anggota::find($request->id);
            $anggota->nama = $request->nama;
            $anggota->nim = $request->nim;
            $anggota->alamat = $request->alamat;
            $anggota->asal = $request->asal;

            $anggota->save();

            return response()->json([
                'success' => true,
                'message' => 'Succesfully',

            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
