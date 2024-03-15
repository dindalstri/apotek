@extends('adminlte::page')
@section('title', 'Edit Obat')
@section('content_header')
<h1 class="m-0 text-dark">Edit Obat</h1>
@stop
@section('content')
<form action="{{route('obat.update', $obat)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    
                    <div class="form-group">
                        <label for="exampleInputKode_Obat">Kode_Obat</label>
                        <input type="text" class="form-control
    @error('kode_obat') is-invalid @enderror" id="exampleInputKode_Obat" placeholder="Kode_Obat" name="kode_obat" value="{{$obat->kode_obat ??
    old('kode_obat')}}">
                        @error('kode_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama_obat">Nama_Obat
                            address</label>
                        <input type="nama_obat" class="form-control
    @error('nama_obat') is-invalid @enderror" id="exampleInputnama_obat" placeholder="Masukkan nama_obat" name="nama_obat" value="{{$obat->nama_obat ??
    old('nama_obat')}}">
                        @error('nama_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMerk">Merk
                            address</label>
                        <input type="merk" class="form-control
    @error('merk') is-invalid @enderror" id="exampleInputmerk" placeholder="Masukkan merk" name="merk" value="{{$obat->merk ??
    old('merk')}}">
                        @error('merk') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputJenis">Jenis
                            address</label>
                        <input type="jenis" class="form-control
    @error('jenis') is-invalid @enderror" id="exampleInputjenis" placeholder="Masukkan jenis" name="jenis" value="{{$obat->jenis ??
    old('jenis')}}">
                        @error('jenis') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputGolongan">Golongan
                            address</label>
                        <input type="golongan" class="form-control
    @error('golongan') is-invalid @enderror" id="exampleInputgolongan" placeholder="Masukkan golongan" name="golongan" value="{{$obat->golongan ??
    old('golongan')}}">
                        @error('golongan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputKemasan">Kemasan
                            address</label>
                        <input type="kemasan" class="form-control
    @error('kemasan') is-invalid @enderror" id="exampleInputkemasan" placeholder="Masukkan kemasan" name="kemasan" value="{{$obat->kemasan ??
    old('kemasan')}}">
                        @error('kemasan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputSatuan">Satuan
                            address</label>
                        <input type="satuan" class="form-control
    @error('satuan') is-invalid @enderror" id="exampleInputsatuan" placeholder="Masukkan satuan" name="satuan" value="{{$obat->satuan ??
    old('satuan')}}">
                        @error('satuan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputHarga_Jual">Harga_Jual
                            address</label>
                        <input type="harga_jual" class="form-control
    @error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual" placeholder="Masukkan harga_jual" name="harga_jual" value="{{$obat->harga_jual ??
    old('harga_jual')}}">
                        @error('harga_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputStok">Stok
                            address</label>
                        <input type="stok" class="form-control
    @error('stok') is-invalid @enderror" id="exampleInputstok" placeholder="Masukkan stok" name="stok" value="{{$obat->stok ??
    old('stok')}}">
                        @error('stok') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('obat.index') }}" class="btn btn-danger">Batal</a>
                    
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop