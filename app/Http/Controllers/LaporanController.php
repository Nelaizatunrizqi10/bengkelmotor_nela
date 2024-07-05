<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembukuan;
use App\Models\Laporan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function generatePDF()
    {
        dd('generatePDF method reached'); // Debugging line
        $pembukuan = Pembukuan::all();
        
        $pdf = PDF::loadView('laporan.pdf', compact('pembukuan'));
        
        return $pdf->download('laporan_keuangan.pdf');
    }
}