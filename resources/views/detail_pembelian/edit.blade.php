@extends('adminlte::page')
@section('title', 'Edit Detail Pembelian')
@section('content_header')
<h1 class="m-0 text-dark">Edit Detail Pembelian</h1>
@stop
@section('content')
<form action="{{ route('detail_pembelian.update', $detail_pembelian) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                <div class="form-group">
                        <label for="nonota_beli">Nomor Nota Beli</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pembelian" id="id_pembelian"
                                value="{{$detail_pembelian->fpembelian->id ??old('id_pembelian')}}">
                            <input type="text" class="form-control @error('nonota_beli') is-invalid @enderror"
                                placeholder="Nomor Nota Beli" id="nonota_beli" name="nonota_beli"
                                value="{{$detail_pembelian->fpembelian->nonota_beli ??old('nonota_beli') }}" aria-label="Nomor Nota Beli" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari Nomor Nota Beli</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTgl_Kadaluarsa">Tgl_Kadaluarsa</label>
                        <input type="date" class="form-control
@error('tgl_kadaluarsa') is-invalid @enderror" id="exampleInputtgl_kadaluarsa" placeholder="tgl_kadaluarsa" name="tgl_kadaluarsa"
                            value="{{ old('tgl_kadaluarsa') }}">
                        @error('tgl_kadaluarsa')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHarga_Beli">Harga_Beli</label>
                        <input type="text" class="form-control
@error('harga_beli') is-invalid @enderror" id="exampleInputHarga_Beli" placeholder="Harga_Beli" name="harga_beli"
                            value="{{ old('harga_beli') }}">
                        @error('harga_beli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJumlah_Beli">Jumlah_Beli</label>
                        <input type="text" class="form-control
@error('jumlah_beli') is-invalid @enderror" id="exampleInputjumlah_Beli" placeholder="Jumlah_Beli" name="jumlah_beli"
                            value="{{ old('jumlah_beli') }}">
                        @error('jumlah_beli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSub_Total_Beli">Sub_Total_Beli</label>
                        <input type="text" class="form-control
@error('sub_total_beli') is-invalid @enderror" id="exampleInputSub_Total_Beli" placeholder="Sub_Total_Beli" name="sub_total_beli"
                            value="{{ old('sub_total_beli') }}">
                        @error('sub_total_beli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPersen_Margin_Jual">Persen_Margin_Jual</label>
                        <input type="text" class="form-control
@error('persen_margin_jual') is-invalid @enderror" id="exampleInputPersen_Margin_Jual" placeholder="Persen_Margin_Jual" name="persen_margin_jual"
                            value="{{ old('persen_margin_jual') }}">
                        @error('persen_margin_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
            

                        <div class="form-group">
                        <label for="id_obat">Id Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{$detail_pembelian->fobat->id ??old('id_obat')}}">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                placeholder="Nama Obat" id="nama_obat" name="nama_obat" value="{{$detail_pembelian->fobat->nama_obat ??old('nama_obat') }}"
                                aria-label="Nama Distributor" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop2"></i>Cari Obat</button>
                        </div>

                        <div>


                            <!--  Modal  -->
                            <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static"
                                data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian No Nota
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <table class="table table-hover table-bordered tablestripped" id="example2">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>No Nota</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pembelian as $key => $pembelian)
                                                    <tr>
                                                        <td>{{$key+1}}</td>                        
                                                        <td id={{$key+1}}>{{$pembelian->nonota_beli}}</td>


                                                        <td>
                                                            <button type="button" class="btn  btn-danger btn-xs"
                                                                onclick="pilih('{{$pembelian->id}}',  '{{$pembelian->nonota_beli}}')"
                                                                data-bs-dismiss="modal">
                                                                Pilih
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--  Modal  -->
                            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Obat</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <table class="table table-hover table-bordered tablestripped" id="example3">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama_Obat</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($obat as $key => $obat)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td id={{$key+1}}>{{$obat->nama_obat}}</td>
                                                        <td>
                                                            <button type="button" class="btn  btn-danger btn-xs" onclick="pilih2('{{$obat->id}}',  '{{$obat->nama_obat}}')"
                                                                data-bs-dismiss="modal">Pilih</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">Simpan</button>
                                <a href="{{ route('detail_pembelian.index') }}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop
        @push('js')
        <script>
            $('#example1').DataTable({
                "responsive": true,
            });
            //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
            function pilih(id, nonota_beli) {
                document.getElementById('id_pembelian').value = id
                document.getElementById('nonota_beli').value = nonota_beli
            }

            $('#example3').DataTable({
                "responsive": true,
            });
            //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Distributor dari Modal ke form tambah
            function pilih2(id, nama_obat) {
                document.getElementById('id_obat').value = id
                document.getElementById('nama_obat').value = id_obat
            }

        </script>
        @endpush
