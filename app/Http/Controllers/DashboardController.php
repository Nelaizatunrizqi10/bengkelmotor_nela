<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriService;
use App\Models\Servis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barangCount = Barang::count();
        $kategoriServiceCount = KategoriService::count();
        $totalPembayaran = Servis::sum('jumlah_bayar');

        // Mengambil data untuk chart jumlah pembayaran servis
        $servisData = Servis::selectRaw('SUM(jumlah_bayar) as total_pembayaran')
                            ->get();

        // Membuat chart data
        $chartData = [
            'labels' => ['Total Pembayaran'],
            'data' => $servisData->pluck('total_pembayaran')->toArray(),
        ];

        $barang = Barang::all();

        return view('dashboard.index', compact(
            'barangCount',
            'kategoriServiceCount',
            'totalPembayaran',
            'chartData',
            'barang'
        ));
    }
}
