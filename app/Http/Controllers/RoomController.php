<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
        ]);

        // Simpan ruangan baru ke database
        $room = Room::create([
            'name' => $request->nama_ruangan,
        ]);

        // Mengembalikan response dengan data ruangan baru
        return response()->json([
            'room' => $room,
            'message' => 'Ruangan berhasil ditambahkan!',
        ]);
    }

    public function showHistory($roomId)
    {
        $room = Room::findOrFail($roomId);
        // Ambil riwayat untuk ruangan ini jika ada
        $history = $room->history; // misal ada relasi history yang sudah dibuat

        return view('riwayat.room', compact('room', 'history'));
    }
}
