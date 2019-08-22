<?php
namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        try {
            $barang = Barang::orderBy('kode_barang', 'asc')->get();
            return response()->json([
                'message' => 'Success Retrieved Barang',
                'barang' => $barang,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Internal server error',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $barangData = $request->only(['kode_barang', 'nama_barang', 'harga_barang', 'gambar_barang', 'jumlah_barang']);
            $newBarang = Barang::create($barangData);
            return response()->json([
                'message' => 'Successed add barang',
                'barang' => $newBarang,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Internal server error',
            ], 500);
        }
    }

    public function show($kode)
    {
        try {
            $barang = Barang::where('kode_barang', $kode)->first();
            if ($barang) {
                return response()->json([
                    'message' => 'Success Retrieved Barang',
                    'barang' => $barang,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Barang Not Found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Internal server error',
            ], 500);
        }
    }

    public function update(Request $request, $kode)
    {
        try {
            $barang = Barang::where('kode_barang', $kode)->first();
            if ($barang) {
                $barangData = $request->only(['kode_barang', 'nama_barang', 'harga_barang', 'gambar_barang', 'jumlah_barang']);
                $barangUpdate = $barang->update($barangData);
                return response()->json([
                    'message' => 'Success Updated Data',
                    'barang' => $barang,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Barang Not Found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Internal server error',
            ], 500);
        }
    }

    public function destroy($kode)
    {
        try {
            $barang = Barang::where('kode_barang', $kode)->first();
            if ($barang) {
                $barang->delete();
                return response()->json([
                    'message' => 'Success Deleted Barang',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Barang Not Found',
                ], 404);
            }
        } catch (\Exception $e) {
            dd($e);
            return response()->json([
                'message' => 'Internal server error',
            ], 500);
        }
    }
}
