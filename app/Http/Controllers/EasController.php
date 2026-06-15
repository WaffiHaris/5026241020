<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class easController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel tagihan_air
        $tagihan = DB::table('tagihan_air')->get();

        // Memanggil file view di folder resources/views/eas/index.blade.php
        return view('eas.index', compact('tagihan'));
    }

    public function create()
    {
        return view('eas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID' => 'required|integer',
            'NoMeteran' => 'required|string|max:6',
            'MeteranAwal' => 'required|integer|min:0',
            'MeteranAkhir' => 'required|integer|min:0'
        ]);

        DB::table('tagihan_air')->insert([
            'ID' => $request->ID,
            'NoMeteran' => $request->NoMeteran,
            'MeteranAwal' => $request->MeteranAwal,
            'MeteranAkhir' => $request->MeteranAkhir
        ]);

        return redirect()->route('eas.index')->with('success', 'Data tagihan air berhasil ditambahkan.');
    }

}
