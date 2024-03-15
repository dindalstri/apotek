<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use PDF;

class laporan1Controller extends Controller
{
    public function laporan1(request $request)
    {
        $tanggal = $request->input('tgl_beli');
        // if ($request->start && $request->end && $request->status) {
            $pembelian = Pembelian::where('tgl_beli',   $tanggal )->get();
        // } elseif ($request->start && $request->end) {
        //     $penjualan = Penjualan::whereBetween('tgl_jual', [$request->start, $request->end])->get();
        // } elseif ($request->status) {
        //     $penjualan = Penjualan::where('nonota_jual', $request->status)->get();
        // } else {
        //     $penjualan = Penjualan::get();
        // }
        return view('laporan1', [
            'pembelian' => $pembelian,
        ]);
    }
    public function downloadpdf()
    {
        $pembelian = Pembelian::limit(20)->get();
        $pdf = PDF::loadView('laporan1-pdf', compact('pembelian'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('laporan1-pdf');
        
    }
}