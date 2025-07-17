<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('siswa_foto', 'public');
        }

        Siswa::create([
            'nama' => $validated['nama'],
            'kelas_id' => $validated['kelas_id'],
            'foto' => $fotoPath,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function index()
    {
        $siswas = Siswa::with('kelas')->orderByDesc('id')->get();
        return view('siswa.index', compact('siswas'));
    }

    public function json()
    {
        $siswas = Siswa::with('kelas')->orderByDesc('id')->get();
        $data = $siswas->map(function($s){
            return [
                'id' => $s->id,
                'nama' => $s->nama,
                'foto' => $s->foto,
                'kelas_nama' => $s->kelas->nama ?? null,
            ];
        });
        return response()->json($data);
    }

    public function data()
    {
        $siswas = Siswa::with('kelas')->get();
        return view('siswa.data', compact('siswas'));
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }
        $siswa->delete();
        return redirect()->route('siswa.data')->with('success', 'Siswa berhasil dihapus.');
    }
} 