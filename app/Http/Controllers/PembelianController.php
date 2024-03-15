<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Distributor;
use App\Models\User;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \illuminate\Http\Response
     */
    public function index()
    { 
        //Menampilkan Semua Data Pembelian
        $pembelian = Pembelian::all();
        return view('pembelian.index', [ 
            'pembelian' => $pembelian
        ]);
    } 


    /**
     * Show the form for creating a new resource.
     * 
     * @return \illuminate\Http\Response
     */
    public function create()
    { 
        //Menampilkan Form Tambah Pembelian
        return view(
        'pembelian.create',[
        'users' => User::all(),
        'distributor' => Distributor::all()

        ]);
    
    }
    

    /**
     * Store a newly created resource in storage.
     * 
    * @param \illuminate\Http\Request $request
     * @return \illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //Menyimpan Data Pembelian Baru
        $request->validate([
            'nonota_beli' => 'required',
            'tgl_beli' => 'required',
            'total_beli' => 'required',
            'id_distributor' => 'required',
            'id_user' => 'required'
        ]);
        $array = $request->only([
            'nonota_beli','tgl_beli','total_beli','id_distributor','id_user'
        ]);
        $distributor = Pembelian::create($array);
        return redirect()->route('detail_pembelian.create')->with('success_message', 'Berhasil Menambah Pembelian Baru');
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        //Menampilkan Form Edit
        $pembelian = Pembelian::find($id);
        if (!$pembelian) return redirect()->route('pembelian.index')->with('error_message', 'pembelian dengan id = '.$id.' tidak ditemukan');
        return view('pembelian.edit', [ 
        'pembelian' => $pembelian,
        'users' => User::all(),
        'distributor' => Distributor::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        //Mengedit Data Pembelian
        $request->validate([
            'nonota_beli' => 'required',
            'tgl_beli' => 'required',
            'total_beli' => 'required',
            'id_distributor' => 'required',
            'id_user' => 'required',
        ]);
        $pembelian = Pembelian::find($id);
        $pembelian->nonota_beli = $request->nonota_beli;
        $pembelian->tgl_beli = $request->tgl_beli;
        $pembelian->total_beli = $request->total_beli;
        $pembelian->id_distributor = $request->id_distributor;
        $pembelian->id_user = $request->id_user;
        $pembelian->save();
        return redirect()->route('pembelian.index')->with('success_message', 'Berhasil mengubah pembelian');
    } 


    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id 
     * @return \illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    { 
        //Menghapus pembelian
        $pembelian = Pembelian::find($id);
        if ($pembelian) $pembelian->delete();
        return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menghapus pembelian');
    } 
}