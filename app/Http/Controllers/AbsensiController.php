<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all();
        return view('backend.absensi.index', compact('absensi'));
    }

    public function create()
    {
        return view('backend.absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'clock_in' => 'nullable',
            'clock_out' => 'nullable',
            'overtime' => 'nullable',
            'picture' => 'nullable|string',
            'location' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Absensi::create([
            'nama_karyawan' => $request->nama_karyawan,
            'clock_in' => $request->clock_in ? Carbon::parse($request->clock_in) : null,
            'clock_out' => $request->clock_out ? Carbon::parse($request->clock_out) : null,
            'overtime' => $request->overtime,
            'picture' => $request->picture,
            'location' => $request->location,
            'notes' => $request->notes,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil disimpan.');
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'clock_in' => 'nullable',
            'clock_out' => 'nullable',
            'overtime' => 'nullable',
            'picture' => 'nullable|string',
            'location' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $absensi->update([
            'nama_karyawan' => $request->nama_karyawan,
            'clock_in' => $request->clock_in ? Carbon::parse($request->clock_in) : null,
            'clock_out' => $request->clock_out ? Carbon::parse($request->clock_out) : null,
            'overtime' => $request->overtime,
            'picture' => $request->picture,
            'location' => $request->location,
            'notes' => $request->notes,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function edit(Absensi $absensi)
    {
        return view('backend.absensi.edit', compact('absensi'));
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}