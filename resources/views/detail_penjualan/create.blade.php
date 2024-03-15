@extends('adminlte::page')
@section('title', 'Tambah detail penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah detail penjualan</h1>
@stop
@section('content')
<form action="{{ route('detail_penjualan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                    <label for="nonota_jual">Nomor Nota Jual</label>
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan"
                                value="{{ old('id_penjualan') }}">
                            <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror"
                                placeholder="Nomor Nota Jual" id="nonota_jual" name="nonota_jual"
                                value="{{ old('nonota_jual') }}" aria-label="Nomor Nota Jual" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>Cari Nomor Nota Jual</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputJumlah_Jual">Jumlah_Jual</label>
                        <input type="number" class="form-control
@error('Jumlah_Jual') is-invalid @enderror" id="exampleInputJumlah_Jual" placeholder="jumlah_jual" name="jumlah_jual"
                            value="{{ old('jumlah_jual') }}">
                        @error('jumlah_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHarga_Jual">Harga_Jual</label>
                        <input type="text" class="form-control
@error('harga_jual') is-invalid @enderror" id="exampleInputHarga_Jual" placeholder="Harga_Jual" name="harga_jual"
                            value="{{ old('harga_jual') }}">
                        @error('harga_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputSub_Total_Jual">Sub_Total_Jual</label>
                        <input type="text" class="form-control
@error('sub_total_jual') is-invalid @enderror" id="exampleInputSub_Total_Jual" placeholder="Sub_Total_Jual" name="sub_total_jual"
                            value="{{ old('sub_total_jual') }}">
                        @error('sub_total_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
</div>
            

                    <div class="form-group">
                        <label for="id_obat">Id Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{ old('id_obat') }}">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                placeholder="Nama Obat" id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}"
                                aria-label="Nama Distributor" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari Obat</button>
                        </div>
                        <div class="card-footer">
                                <a href="{{ route('detail_penjualan.create') }}" ><button type="submit"
                                    class="btn btn-primary">Simpan</button></a>
                                    <a href="{{ route('detail_penjualan.index') }}"><button class="btn btn-danger">Batal</button></a>
                            </div>
                        



                            <!--  Modal  -->
                            <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static"
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
                                                    @foreach($penjualan as $key => $penjualan)
                                                    <tr>
                                                        <td>{{$key+1}}</td>                        
                                                        <td id={{$key+1}}>{{$penjualan->nonota_jual}}</td>


                                                        <td>
                                                            <button type="button" class="btn  btn-danger btn-xs"
                                                                onclick="pilih('{{$penjualan->id}}',  '{{$penjualan->nonota_jual}}')"
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

                            <!-- End Modal -->
                            <!--  Modal  -->
                            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian No Nota</h1>
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
                                                            <button type="button" class="btn  btn-danger 
    btn-xs" onclick="pilih1('{{$obat->id}}',  '{{$obat->nama_obat}}')"
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



                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal-->
        @stop
        @push('js')
        <script>
            $('#example2').DataTable({
                "responsive": true,
            });
            //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
            function pilih(id, nonota_jual) {
                document.getElementById('id_penjualan').value = id
                document.getElementById('nonota_jual').value = nonota_jual
            }

            $('#example3').DataTable({
                "responsive": true,
            });
            //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Distributor dari Modal ke form tambah
            function pilih1(id, nama_obat) {
                document.getElementById('id_obat').value = id
                document.getElementById('nama_obat').value = nama_obat
            }

        </script>
        @endpush
