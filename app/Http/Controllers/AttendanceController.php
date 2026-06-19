<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller 
{
    /**
     * Menampilkan daftar absensi 30 santri.
     */
    public function index() 
    {
        $data_absensi = Attendance::orderBy('nama_santri', 'asc')->get();
        return view('absensi.index', compact('data_absensi'));
    }

    /**
     * Menyimpan data santri baru.
     */
    public function store(Request $request) 
    {
        $request->validate([
            'nisn' => 'required|string|unique:attendances,nisn',
            'nama_santri' => 'required|string|max:255',
            'kamar_kelas' => 'required|string|max:100',
            'status' => 'required|in:Hadir,Sakit,Izin,Alpa',
            'keterangan' => 'nullable|string'
        ]);

        Attendance::create($request->all());
        return redirect()->back()->with('with_success', 'Data absensi santri berhasil dicatat!');
    }

    /**
     * Mengubah status kehadiran santri.
     */
    public function update(Request $request, Attendance $attendance) 
    {
        $request->validate([
            'status' => 'required|in:Hadir,Sakit,Izin,Alpa',
            'keterangan' => 'nullable|string'
        ]);

        $attendance->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back()->with('with_success', 'Status absensi berhasil diperbarui!');
    }

    /**
     * Menghapus data santri dari jurnal absensi.
     */
    public function destroy(Attendance $attendance) 
    {
        $attendance->delete();
        return redirect()->back()->with('with_success', 'Data absensi berhasil dihapus!');
    }
}