<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Pembukuan;

class LaporanController extends Controller
{
    public function generatePDF()
    {
        $pembukuan = Pembukuan::all();
        $data = [
            'pembukuan' => $pembukuan,
            'title' => 'Laporan Akuntansi',
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('laporan.pdf', $data);

        return $pdf->download('laporan_akuntansi.pdf');
    }
}
