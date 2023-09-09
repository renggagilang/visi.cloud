<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pecahanAwal = [
            2000 => 7,
            1000 => 1,
            10000 => 3,
            5000 => 4,
            50000 => 1,
            100000 => 1,
            500 => 4,
        ];

        $totalBiaya = 2500;

        $pecahanDibayarkan = [5000 => 1];

        return view('welcome', compact('pecahanAwal', 'totalBiaya', 'pecahanDibayarkan'));
    }

    public function processTransaction(Request $request)
    {
        $request->validate([
            'totalBiaya' => 'required|numeric',
            'pecahanDibayarkan' => 'required|array',
        ]);

        $totalBiaya = $request->input('totalBiaya');
        $pecahanDibayarkan = $request->input('pecahanDibayarkan');

        $pecahanAwal = [
            2000 => 7,
            1000 => 1,
            10000 => 3,
            5000 => 4,
            50000 => 1,
            100000 => 1,
            500 => 4,
        ];

        $totalDibayarkan = 0;

        foreach ($pecahanDibayarkan as $nominal => $jumlah) {
            $totalDibayarkan += $nominal * $jumlah;
        }

        $kembalian = $totalDibayarkan - $totalBiaya;

        $pecahanYangDiberikan = [];
        foreach ($pecahanAwal as $nominal => $jumlahAwal) {
            $jumlahDiberikan = 0;

            while ($kembalian >= $nominal && $jumlahAwal > 0) {
                $kembalian -= $nominal;
                $jumlahAwal--;
                $jumlahDiberikan++;
            }

            if ($jumlahDiberikan > 0) {
                $pecahanYangDiberikan[$nominal] = $jumlahDiberikan;
            }
        }

        $this->perbaruiPecahanSetelahTransaksi($pecahanAwal, $pecahanDibayarkan, $pecahanYangDiberikan);

        return view('welcome', compact('kembalian', 'pecahanYangDiberikan', 'pecahanAwal'));
    }

    private function perbaruiPecahanSetelahTransaksi(&$pecahanAwal, $pecahanDibayarkan, $pecahanYangDiberikan)
    {
        foreach ($pecahanDibayarkan as $nominal => $jumlahDibayarkan) {
            if (isset($pecahanAwal[$nominal])) {
                $pecahanAwal[$nominal] += $jumlahDibayarkan;
            }
        }

        foreach ($pecahanYangDiberikan as $nominal => $jumlahDiberikan) {
            if (isset($pecahanAwal[$nominal])) {
                $pecahanAwal[$nominal] -= $jumlahDiberikan;
            }
        }
    }
}
