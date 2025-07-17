<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kelas_foto', 'public');
        }

        Kelas::create([
            'nama' => $validated['nama'],
            'foto' => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function index()
    {
        $kelas = \App\Models\Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function json()
    {
        return response()->json(\App\Models\Kelas::all(['id','nama']));
    }

    public function destroy($id)
    {
        $kelas = \App\Models\Kelas::findOrFail($id);
        if ($kelas->foto) {
            Storage::disk('public')->delete($kelas->foto);
        }
        $kelas->delete();
        return response()->json(['success' => true]);
    }
} 