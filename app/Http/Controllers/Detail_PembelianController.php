<?php

namespace App\Http\Controllers;
use App\Models\detail_pembelian;
use App\Models\pembelian;
use App\Models\obat;
use Illuminate\Http\Request;

class Detail_PembelianController extends Controller
{
    public function index()
    {
        //
        $detail_pembelian = detail_pembelian::all();
        return view('detail_pembelian.index', [
            'detail_pembelian' => $detail_pembelian
        ]);
    }

    public function create()
    {
        return view(
            'detail_pembelian.create' , [
            'pembelian' => pembelian::all(),
            'obat' => obat::all()
        ]);
    }

    public function store(Request $request)
    // {
    //     $request->validate([
    //     'id_pembelian' => 'required',
    //     'tgl_kadaluarsa' => 'required',
    //     'harga_beli' => 'required',
    //     'jumlah_beli' => 'required',
    //     'sub_total_beli' => 'required',
    //     'persen_margin_jual' => 'required',
    //     'id_obat' => 'required'
    //     ]);
    //     $array = $request->only([
    //     'id_pembelian','tgl_kadaluarsa', 'harga_beli', 'jumlah_beli','sub_total_beli',  'persen_margin_jual','id_obat'
    //     ]);
    //     detail_pembelian::create($array);
    //     return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menambah Detail Pembelian Baru');
    
    {
        $request->validate([
            'id_pembelian' => 'required',
            'tgl_kadaluarsa' => 'required',
            'harga_beli' => 'required',
            'jumlah_beli' => 'required',
            'persen_margin_jual' => 'required',
            'id_obat' => 'required'
        ]);
    
        $data = $request->only([
            'id_pembelian', 'tgl_kadaluarsa', 'harga_beli', 'jumlah_beli', 'persen_margin_jual', 'id_obat'
        ]);
    
        $sub_total_beli = $request->input('harga_beli') * $request->input('jumlah_beli');
        $data['sub_total_beli'] = $sub_total_beli;
    
        // Lakukan perhitungan lainnya jika ada
    
        detail_pembelian::create($data);
    
        return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menambah Detail Pembelian Baru');
    }

    public function edit($id)
    {
        $detail_pembelian = detail_pembelian::find($id);
        if (!$detail_pembelian) return redirect()->route('detail_pembelian.index')->with('error_message', 'detail_pembelian dengan id = '.$id.' tidak ditemukan');
        return view('detail_pembelian.edit', [
        'detail_pembelian' => $detail_pembelian,
        'pembelian' => pembelian::all(),
        'obat' => obat::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'id_pembelian' => 'required',
        'tgl_kadaluarsa' => 'required',
        'harga_beli' => 'required',
        'jumlah_beli' => 'required',
        'sub_total_beli' => 'required',
        'persen_margin_jual' => 'required',
        'id_obat' => 'required'
        ]);
        $detail_pembelian = detail_pembelian::find($id);
        $detail_pembelian->id_pembelian = $request->id_pembelian;
        $detail_pembelian->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $detail_pembelian->harga_beli = $request->harga_beli;
        $detail_pembelian->jumlah_beli = $request->jumlah_beli;
        $detail_pembelian->sub_total_beli = $request->sub_total_beli;
        $detail_pembelian->persen_margin_jual = $request->persen_margin_jual;
        $detail_pembelian->id_obat = $request->id_obat;
        $detail_pembelian->save();
        return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil mengubah Detail Pembelian');
    }

    public function destroy($id)
    {
        $detail_pembelian = detail_pembelian::find($id);

        if ($detail_pembelian) $detail_pembelian->delete();
        return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menghapus Detail Pembelian');
    }
}