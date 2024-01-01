@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tindaklanjutsarana.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- <input type="hidden" name="author" value="{{ Auth::user()->id }}"> --}}
               
                <div class="form-row">

                 <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Ruangan</label>
                        <select class="custom-select" name="id_ruangans" aria-label="Default select example" required>
                            <option selected>--Pilih Ruangan--</option>
                            @foreach ($ruangan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_ruangan }}</option>
                            @endforeach
                        </select>
                        @error('ruangan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama_barang"
                                id="nama" placeholder="Nama Barang" required>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kerusakan">Kerusakan</label>
                            <input type="text" class="form-control @error('kerusakan') is-invalid @enderror" name="kerusakan"
                                id="kerusakan" placeholder="Kerusakan" required>
                            @error('kerusakan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                id="tanggal" placeholder="Tanggal" required>
                            @error('tanggal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    


                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="lapor_kapsek">Sudah Di Laporkan Kepala Sekolah</label>
                            <select class="custom-select  @error('lapor_kapsek') is-invalid @enderror" name="lapor_kapsek"
                                id="lapor_kapsek" value="{{ old('lapor_kapsek') }}" required>
                                <option value="yes">Sudah</option>
                                <option value="no">Belum</option>
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
                                <option value="yes">Sudah</option>
                                <option value="no">Belum</option>
                            </select>
                            @error('lapor_yayasan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal_perbaikan">Tanggal Perbaikan</label>
                            <input type="date" class="form-control @error('tanggal_perbaikan') is-invalid @enderror" name="tanggal_perbaikan"
                                id="tanggal_perbaikan" placeholder="Tanggal Perbaikan">
                            @error('tanggal_perbaikan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                id="keterangan" placeholder="keterangan" required>
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </div>

                    
                <button type="submit" class="btn btn-primary">Save</button>
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
