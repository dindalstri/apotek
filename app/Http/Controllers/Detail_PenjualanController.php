<?php

namespace App\Http\Controllers;
use App\Models\detail_penjualan;
use App\Models\penjualan;
use App\Models\obat;
use Illuminate\Http\Request;

class Detail_PenjualanController extends Controller
{
    public function index()
    {
        //
        $detail_penjualan = detail_penjualan::all();
        return view('detail_penjualan.index', [
            'detail_penjualan' => $detail_penjualan
        ]);
    }

    public function create()
    {
        return view(
            'detail_penjualan.create' , [
            'penjualan' => penjualan::all(),
            'obat' => obat::all()
        ]);
    }

    public function store(Request $request)
    // {
    //     $request->validate([
    //     'id_penjualan' => 'required',
    //     'jumlah_jual' => 'required',
    //     'harga_jual' => 'required',
    //     'sub_total_jual' => 'required',
    //     'id_obat' => 'required'
    //     ]);
    //     $array = $request->only([
    //     'id_penjualan','jumlah_jual', 'harga_jual', 'sub_total_jual', 'id_obat'
    //     ]);
    //     detail_penjualan::create($array);
    //     return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menambah Detail Penjualan Baru');

    {
        $request->validate([
            'id_penjualan' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required',
            'sub_total_jual' => 'required',
            'id_obat' => 'required'
        ]);
    
        $data = $request->only([
            'id_penjualan', 'jumlah_jual', 'harga_jual', 'sub_total_jual', 'id_obat'
        ]);
    
        $sub_total_jual = $request->input('harga_jual') * $request->input('jumlah_jual');
        $data['sub_total_jual'] = $sub_total_jual;
    
        // Lakukan perhitungan lainnya jika ada
    
        detail_penjualan::create($data);
    
        return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menambah Detail Penjualan Baru');
    }
    
    public function edit($id)
    {
        $detail_penjualan = detail_penjualan::find($id);
        if (!$detail_penjualan) return redirect()->route('detail_penjualan.index')->with('error_message', 'detail_penjualan dengan id = '.$id.' tidak ditemukan');
        return view('detail_penjualan.edit', [
        'detail_penjualan' => $detail_penjualan,
        'penjualan' => penjualan::all(),
        'obat' => obat::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'id_penjualan' => 'required',
        'jumlah_jual' => 'required',
        'harga_jual' => 'required',
        'sub_total_jual' => 'required',
        'id_obat' => 'required'
        ]);
        $detail_penjualan = detail_penjualan::find($id);
        $detail_penjualan->id_penjualan = $request->id_penjualan;
        $detail_penjualan->jumlah_jual = $request->jumlah_jual;
        $detail_penjualan->harga_jual = $request->harga_jual;
        $detail_penjualan->sub_total_jual = $request->sub_total_jual;
        $detail_penjualan->id_obat = $request->id_obat;
        $detail_penjualan->save();
        return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil mengubah Detail Penjualan');
    }

    public function destroy($id)
    {
        $detail_penjualan = detail_penjualan::find($id);

        if ($detail_penjualan) $detail_penjualan->delete();
        return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menghapus Detail Penjualan');
    }
}