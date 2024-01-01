@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('acproblem.update', $data->id) }}" method="post">
                @csrf
                @method('put')
              <div class="form-row">

              <div class="col-md-6">
                        <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Ruangan</label>
                    <select class="custom-select" name="id_ruangans" aria-label="Default select example" required>
                        <option selected value="{{ $data->id }}">{{ $data->ruangans->nama_ruangan }}</option>
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
                            <label for="jenis_ac">Jenis AC</label>
                            <input type="text" class="form-control @error('jenis_ac') is-invalid @enderror" name="jenis_ac"
                                id="jenis_ac" placeholder="Jenis AC" required value="{{ $data->jenis_ac }}">
                            @error('jenis_ac')
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
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                id="tanggal" placeholder="tanggal" required value="{{ $data->tanggal }}">
                            @error('tanggal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kerusakan">Kerusakan</label>
                            <input type="text" class="form-control @error('kerusakan') is-invalid @enderror" name="kerusakan"
                                id="kerusakan" placeholder="kerusakan" required value="{{ $data->kerusakan }}">
                            @error('kerusakan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="penanganan">Penanganan</label>
                            <input type="text" class="form-control @error('penanganan') is-invalid @enderror" name="penanganan"
                                id="penanganan" placeholder="penanganan" required value="{{ $data->penanganan }}">
                            @error('penanganan')
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
