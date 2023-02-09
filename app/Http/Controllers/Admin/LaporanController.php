<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }
    public function getLaporan(Request $request)
    {
        $dari = $request->dari . ' ' . '00:00:00';
        $ke = $request->ke . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$dari, $ke])->get();

        return view('Admin.Laporan.index', [
            'pengaduan' => $pengaduan, 'dari' => $dari, 'ke' => $ke
        ]);
    }

    public function cetakLaporan($dari, $ke)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$dari, $ke])->get();

        $pdf = Pdf::loadView('Admin.Laporan.cetak', [
            'pengaduan' => $pengaduan
        ]);

        return $pdf->download('Rekap_Laporan.pdf');
    }
}
