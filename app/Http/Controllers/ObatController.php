<?php

namespace App\Http\Controllers;
use App\Models\obat;
use Illuminate\Http\Request;

class obatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obat = obat::all();
        return view('obat.index', [
            'obat' => $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'kode_obat'  => 'required|unique:obat,kode_obat',
        'nama_obat'  => 'required|unique:obat,nama_obat',
        'merk'  => 'required',
        'jenis'  => 'required',
        'golongan'  => 'required',
        'kemasan'  => 'required',
        'satuan' => 'required',
        'harga_jual' => 'required',
        'stok'  => 'required'
        ]);
        $array = $request->only([
        'kode_obat', 'nama_obat', 'merk', 'jenis', 'golongan', 'kemasan', 'satuan', 'harga_jual', 'stok'
        ]);
        $obat = obat::create($array);
        return redirect()->route('obat.index')->with('success_message', 'Berhasil menambah obat baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obat = obat::find($id);
        if (!$obat) return redirect()->route('obat.index')->with('error_message', 'obat dengan id = '.$id.' tidak ditemukan');
        return view('obat.edit', [
        'obat' => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'golongan'  => 'required',
            'kemasan'  => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
            ]);
            $obat = obat::find($id);
            $obat->kode_obat = $request->kode_obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->merk = $request->merk;
            $obat->jenis = $request->jenis;
            $obat->golongan = $request->golongan;
            $obat->kemasan = $request->kemasan;
            $obat->satuan = $request->satuan;
            $obat->harga_jual = $request->harga_jual;
            $obat->stok = $request->stok;
            $obat->save();
            return redirect()->route('obat.index')->with('success_message', 'Berhasil mengubah obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obat = obat::find($id);

        if ($obat) $obat->delete();
        return redirect()->route('obat.index')->with('success_message', 'Berhasil menghapus obat');
    }
}