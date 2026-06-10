<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SepedamotorController extends Controller
{
    public function index()
    {
        // Mengambil semua data sepedamotor
        $sepedamotor = DB::table('sepedamotor')->orderBy('kodesepedamotor')->get();
        return view('sepedamotor.index', compact('sepedamotor'));
    }

    public function create()
    {
        return view('sepedamotor.create');
    }

    public function store(Request $request)
    {
        // Validasi input (kodesepedamotor tidak divalidasi karena auto-increment)
        $request->validate([
            'merksepedamotor' => 'required|string|max:30',
            'stocksepedamotor' => 'required|integer|min:0',
            'tersedia' => 'required|string|max:1',
        ]);

        // Insert data
        DB::table('sepedamotor')->insert([
            'merksepedamotor' => $request->merksepedamotor,
            'stocksepedamotor' => $request->stocksepedamotor,
            'tersedia' => $request->tersedia,
        ]);

        return redirect()->route('sepedamotor.index')->with('success', 'Data sepeda motor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sepedamotor = DB::table('sepedamotor')->where('kodesepedamotor', $id)->first();

        if (!$sepedamotor) {
            abort(404);
        }

        return view('sepedamotor.edit', compact('sepedamotor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'merksepedamotor' => 'required|string|max:30',
            'stocksepedamotor' => 'required|integer|min:0',
            'tersedia' => 'required|string|max:1',
        ]);

        // Update data
        DB::table('sepedamotor')
            ->where('kodesepedamotor', $id)
            ->update([
                'merksepedamotor' => $request->merksepedamotor,
                'stocksepedamotor' => $request->stocksepedamotor,
                'tersedia' => $request->tersedia,
            ]);

        return redirect()->route('sepedamotor.index')->with('success', 'Data sepeda motor berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table('sepedamotor')->where('kodesepedamotor', $id)->delete();

        return redirect()->route('sepedamotor.index')->with('success', 'Data sepeda motor berhasil dihapus.');
    }
}
