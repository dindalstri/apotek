@extends('adminlte::page')
@section('title', 'Tambah obat')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah obat</h1>
@stop
@section('content')
    <form action="{{ route('obat.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputKode_Obat">Kode Obat</label>
                            <input type="text" class="form-control
@error('kode_obat') is-invalid @enderror"
                                id="exampleInputKode_Obat" placeholder="Kode Obat" name="kode_obat"
                                value="{{ old('kode_obat') }}">
                            @error('kode_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNama_Obat">Nama Obat</label>
                            <input type="text" class="form-control
@error('nama_obat') is-invalid @enderror"
                                id="exampleInputNama_Obat" placeholder="Nama Obat" name="nama_obat"
                                value="{{ old('nama_obat') }}">
                            @error('nama_obat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMerk">Merk</label>
                            <input type="text" class="form-control
@error('merk') is-invalid @enderror"
                                id="exampleInputMerk" placeholder="Merk Obat" name="merk" value="{{ old('merk') }}">
                            @error('merk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJenis">Jenis</label>
                            <input type="text" class="form-control
@error('jenis') is-invalid @enderror"
                                id="exampleInputJenis" placeholder="Jenis Obat" name="jenis" value="{{ old('jenis') }}">
                            @error('jenis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGolongan">Golongan</label>
                            <input type="text" class="form-control
@error('golongan') is-invalid @enderror"
                                id="exampleInputGolongan" placeholder="Golongan Obat" name="golongan" value="{{ old('golongan') }}">
                            @error('golongan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputKemasan">Kemasan</label>
                            <input type="text" class="form-control
@error('kemasan') is-invalid @enderror"
                                id="exampleInputKemasan" placeholder="Kemasan Obat" name="kemasan" value="{{ old('kemasan') }}">
                            @error('kemasan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSatuan">Satuan</label>
                            <input type="text" class="form-control
@error('satuan') is-invalid @enderror"
                                id="exampleInputSatuan" placeholder="Satuan Obat i.e ml/gr" name="satuan"
                                value="{{ old('satuan') }}">
                            @error('satuan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputHarga_Jual">Harga Jual</label>
                            <input type="float" class="form-control
@error('harga_jual') is-invalid @enderror"
                                id="exampleInputHarga_Jual" placeholder="Harga Jual" name="harga_jual"
                                value="{{ old('harga_jual') }}">
                            @error('harga_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputStok">Stok</label>
                            <input type="number" class="form-control
@error('stok') is-invalid @enderror"
                                id="exampleInputStok" placeholder="Stok Obat" name="stok" value="{{ old('stok') }}">
                            @error('stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    @stop