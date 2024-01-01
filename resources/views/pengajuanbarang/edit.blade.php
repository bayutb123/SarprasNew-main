@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rubah Data</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pengajuanbarang.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                  <div class="form-row">
                  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama Barang Yang Di Ajukan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="nama" placeholder="Nama Barang" required value="{{ $data->nama }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="banyak_barang">Banyak Barang</label>
                            <input type="number" class="form-control @error('banyak_barang') is-invalid @enderror" name="banyak_barang"
                                id="banyak_barang" placeholder="Banyak Barang" required value="{{ $data->banyak_barang }}">
                            @error('banyak_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="harga_satuan">Harga Satuan</label>
                            <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan"
                                id="harga_satuan" placeholder="Harga Satuan" required value="{{ $data->harga_satuan }}">
                            @error('harga_satuan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                id="jumlah" placeholder="jumlah" required value="{{ $data->jumlah }}">
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="lapor_kapsek">Sudah Di Laporkan Kepala Sekolah</label>
                            <select class="custom-select  @error('lapor_kapsek') is-invalid @enderror" name="lapor_kapsek"
                                id="lapor_kapsek" value="{{ old('lapor_kapsek') }}" required>
                                <option value="yes" @if ($data->lapor_kapsek == 'yes') selected @endif>Sudah</option>
                                <option value="no" @if ($data->lapor_kapsek == 'no') selected @endif>Belum</option>
                                
                            </select>
                            @error('lapor_kapsek')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lapor_yayasan">Sudah Di Laporkan Yayasan</label>
                            <select class="custom-select  @error('lapor_yayasan') is-invalid @enderror" name="lapor_yayasan"
                                id="lapor_yayasan" value="{{ old('lapor_yayasan') }}" required>
                                <option value="yes" @if ($data->lapor_yayasan == 'yes') selected @endif>Sudah</option>
                                <option value="no" @if ($data->lapor_yayasan == 'no') selected @endif>Belum</option>
                            </select>
                            @error('lapor_yayasan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                id="tanggal" placeholder="Tanggal" value="{{ $data->tanggal }}">
                            @error('tanggal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                id="keterangan" placeholder="keterangan" required value="{{ $data->keterangan }}">
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                    <img src="{{ asset('fotobarang/'.$data->foto) }}" alt="" style="width: 100px;">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                                <input type="file" name="foto" class="form-control" >
                        </div>
                    </div>

                </div>
  

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('pengajuanbarang.index') }}" class="btn btn-default">Back to list</a>

            </form>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
