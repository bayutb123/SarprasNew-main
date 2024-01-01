@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Tambah Ruangan') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('ruangan.store') }}" method="post">
                @csrf

                {{-- <input type="hidden" name="author" value="{{ Auth::user()->id }}"> --}}

                <div class="form-group">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_ruangan">Ruangan</label>
                            <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan"
                                id="nama_ruangan" placeholder="Nama Ruangan" required>
                            @error('nama_ruangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="custom-select  @error('kategori') is-invalid @enderror" name="kategori"
                                id="kategori" value="{{ old('kategori') }}" required>
                                <option >--Pilih Ruangan--</option>
                                <option value="ruangan">Ruangan</option>
                                <option value="kelas">kelas</option>
                            </select>
                            @error('kategori')
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
