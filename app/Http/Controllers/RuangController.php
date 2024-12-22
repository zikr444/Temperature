<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\History;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    // Menyimpan data ruangan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
        ]);

        // Simpan ruangan baru
        $ruang = Ruang::create([
            'name' => $request->nama_ruangan,
        ]);

        // Kembalikan data ruangan yang baru disimpan
        return response()->json([
            'ruang' => $ruang,
            'message' => 'Ruangan berhasil ditambahkan!',
        ]);
    }

    // Menampilkan riwayat untuk ruangan tertentu
    public function showHistory($ruangId)
    {
        $ruang = Ruang::findOrFail($ruangId);
        $history = History::where('ruang_id', $ruangId)->get();

        return view('riwayat.ruang', compact('ruang', 'history'));
    }
}
