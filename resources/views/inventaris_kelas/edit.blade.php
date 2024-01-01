@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('inventorykelas.update', $data->id) }}" method="post">
                @csrf
                @method('put')
              <div class="form-row">

              <div class="col-md-6">
                        <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Ruangan</label>
                    <select class="custom-select" name="id_ruangans" aria-label="Default select example" required>
                        <option selected value="{{ $data->id_ruangans }}">{{ $data->ruangans->nama_ruangan }}</option>
                        @foreach ($ruangan as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_ruangan }}</option>
                        @endforeach
                    </select>
                    @error('ruangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
                                id="nama_barang" placeholder="Nama Barang" required value="{{ $data->nama_barang }}">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                id="jumlah" placeholder="jumlah" required value="{{ $data->jumlah }}">
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <select class="custom-select  @error('kondisi') is-invalid @enderror" name="kondisi"
                                id="kondisi" value="{{ old('kondisi') }}" required>
                                <option value="baik" @if ($data->kondisi == 'baik') selected @endif>Baik</option>
                                <option value="buruk" @if ($data->kondisi == 'buruk') selected @endif>Buruk</option>
                            </select>
                            @error('kondisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
              </div>

  

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('inventory.index') }}" class="btn btn-default">Back to list</a>

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
