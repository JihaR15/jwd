<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function landing()
    {
        return view('landing');
    }
    public function index()
    {
        $user = Auth::user();

        $breadcrumb = (object) [
            'title' => 'Selamat Datang, ' . $user->nama,
            'list' => ['Home', 'Dashboard']
        ];

        $activeMenu = 'dashboard';

        // Ringkasan
        $totalPenjualan = DB::table('t_penjualan')->count();
        $totalBarang = DB::table('m_barang')->count();
        $totalUser = DB::table('m_user')->count();

        // Grafik Penjualan Bulanan
        $bulan = [];
        $totalPerBulan = [];

        for ($i = 1; $i <= 12; $i++) {
            $bulan[] = Carbon::create()->month($i)->locale('id')->translatedFormat('F');

            // Jika t_penjualan tidak menyimpan total, kita hitung dari t_penjualan_detail
            $penjualan_ids = DB::table('t_penjualan')
                ->whereMonth('penjualan_tanggal', $i)
                ->whereYear('penjualan_tanggal', date('Y'))
                ->pluck('penjualan_id');

            $total = DB::table('t_penjualan_detail')
                ->whereIn('penjualan_id', $penjualan_ids)
                ->select(DB::raw('SUM(jumlah * harga) as total'))
                ->value('total') ?? 0;

            $totalPerBulan[] = $total;
        }

        $barangStokRendah = $penjualanTerakhir = null;
        // Ambil barang yang stok < 5
        $barangStokRendah = DB::table('m_barang')
            ->join('t_stok', 'm_barang.barang_id', '=', 't_stok.barang_id')
            ->select('m_barang.barang_nama', 't_stok.stok_jumlah')
            ->where('t_stok.stok_jumlah', '<', 10)
            ->get();

        // Ambil penjualan terakhir oleh user tersebut
        $penjualanTerakhir = DB::table('t_penjualan')
            ->where('user_id', $user->user_id)
            ->orderByDesc('penjualan_tanggal')
            ->first();

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'totalPenjualan' => $totalPenjualan ?? 0,
            'totalBarang' => $totalBarang ?? 0,
            'totalUser' => $totalUser ?? 0,
            'bulan' => $bulan ?? [],
            'totalPerBulan' => $totalPerBulan ?? [],
            'barangStokRendah' => $barangStokRendah ?? collect(),
            'penjualanTerakhir' => $penjualanTerakhir,
        ]);
    }
}
