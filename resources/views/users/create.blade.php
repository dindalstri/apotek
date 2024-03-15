@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
<h1 class="m-0 text-dark">Tambah User</h1>
@stop
@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control
    @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name"
                            value="{{old('name')}}">
                        @error('name') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email
                            address</label>
                        <input type="email" class="form-control
    @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                            value="{{old('email')}}">
                        @error('email') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control
    @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi
                            Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword"
                            placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputlevel">Level</label>
                        <select class="form-control @error('level') isinvalid @enderror" id="exampleInputlevel"
                            name="level">
                            <option value="Pemilik" @if(old('level')=='Pemilik' )selected @endif>Pemilik</option>
                            <option value="Kasir" @if(old('level')=='Kasir' )selected @endif>Kasir</option>
                            <option value="Apoteker" @if(old('level')=='Apoteker' )selected @endif>Apoteker</option>
                            <option value="Gudang" @if(old('level')=='Gudang' )selected @endif>Gudang</option>
                        </select>
                        @error('level') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btnprimary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btndefault">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop