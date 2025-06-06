<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use Carbon\Carbon;

class PresenceController extends Controller
{
    // Cetak kehadiran harian berdasarkan tanggal tertentu
    public function cetakHarian(Request $request)
    {
        // Tangkap tanggal dari query param, default hari ini
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        // Ambil data kehadiran hari itu dengan relasi user
        $presences = Presence::with('user')
            ->whereDate('scan_time', $tanggal)
            ->get();

        return view('prints.cetak-harian', compact('presences', 'tanggal'));
    }

    // Cetak kehadiran bulanan berdasarkan bulan dan tahun tertentu
    public function cetakBulanan(Request $request)
    {
        // Tangkap bulan dan tahun dari query param, default bulan & tahun sekarang
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        // Ambil data kehadiran bulan itu dengan relasi user
        $presences = Presence::with('user')
            ->whereYear('scan_time', $tahun)
            ->whereMonth('scan_time', $bulan)
            ->get();

        // Kirim juga info bulan dan tahun untuk header
        $bulanTahun = Carbon::createFromDate($tahun, $bulan, 1)->format('F Y');

        return view('prints.cetak-bulanan', compact('presences', 'bulanTahun'));
    }
}

