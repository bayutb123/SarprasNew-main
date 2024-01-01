@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data</h1>

    <!-- Main Content goes here -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kebersihan_outdoor.update', $data->id) }}" method="post">
                @csrf
                @method('put')

                <input type="hidden" name="author" value="{{ Auth::user()->id }}">
                <input type="hidden" name="period_id" value="{{ $data->period_id }}">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="name"
                        id="name" placeholder="Nama" autocomplete="off" value="{{ $data->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw1">Minggu Ke-1</label>
                            <select class="form-control  @error('statusw1') is-invalid @enderror" name="statusw1"
                                id="statusw1" value="{{ old('statusw1') }}" required>
                                <option value="0" @if ($data->statusw1 == '0') selected @endif>Belum Diperiksa</option>
                                <option value="Bersih" @if ($data->statusw1 == 'Bersih') selected @endif>Bersih</option>
                                <option value="Tidak Bersih" @if ($data->statusw1 == 'Tidak Bersih') selected @endif>Tidak Bersih</option>
                            </select>
                            @error('statusw1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw2">Minggu Ke-2</label>
                            <select class="form-control  @error('statusw2') is-invalid @enderror" name="statusw2"
                                id="statusw2" value="{{ old('statusw2') }}" required>
                                <option value="0" @if ($data->statusw2 == '0') selected @endif>Belum Diperiksa</option>
                                <option value="Bersih" @if ($data->statusw2 == 'Bersih') selected @endif>Bersih</option>
                                <option value="Tidak Bersih" @if ($data->statusw2 == 'Tidak Bersih') selected @endif>Tidak Bersih</option>
                            </select>
                            @error('statusw2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw3">Minggu Ke-3</label>
                            <select class="form-control  @error('statusw3') is-invalid @enderror" name="statusw3"
                                id="statusw3" value="{{ old('statusw3') }}" required>
                                <option value="0" @if ($data->statusw3 == '0') selected @endif>Belum Diperiksa</option>
                                <option value="Bersih" @if ($data->statusw3 == 'Bersih') selected @endif>Bersih</option>
                                <option value="Tidak Bersih" @if ($data->statusw3 == 'Tidak Bersih') selected @endif>Tidak Bersih</option>
                            </select>
                            @error('statusw3')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw4">Minggu Ke-4</label>
                            <select class="form-control  @error('statusw4') is-invalid @enderror" name="statusw4"
                                id="statusw4" value="{{ old('statusw4') }}" required>
                                <option value="0" @if ($data->statusw4 == '0') selected @endif>Belum Diperiksa</option>
                                <option value="Bersih" @if ($data->statusw4 == 'Bersih') selected @endif>Bersih</option>
                                <option value="Tidak Bersih" @if ($data->statusw4 == 'Tidak Bersih') selected @endif>Tidak Bersih</option>
                            </select>
                            @error('statusw4')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                   
                </div>

                

                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw1date">Tanggal Pemeriksaan 1</label>
                            <input type="date" class="form-control @error('statusw1date') is-invalid @enderror"
                                name="statusw1date" id="statusw1date" placeholder="statusw1date" value="{{ \Carbon\Carbon::parse($data->statusw1date)->format('Y-m-d') }}">
                            @error('statusw1date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw2date">Tanggal Pemeriksaan 2</label>
                            <input type="date" class="form-control @error('statusw2date') is-invalid @enderror"
                                name="statusw2date" id="statusw2date" placeholder="statusw2date" value="{{ \Carbon\Carbon::parse($data->statusw2date)->format('Y-m-d') }}">
                            @error('statusw2date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw3date">Tanggal Pemeriksaan 3</label>
                            <input type="date" class="form-control @error('statusw3date') is-invalid @enderror"
                                name="statusw3date" id="statusw3date" placeholder="statusw3date" value="{{ \Carbon\Carbon::parse($data->statusw3date)->format('Y-m-d') }}">
                            @error('statusw3date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statusw4date">Tanggal Pemeriksaan 4</label>
                            <input type="date" class="form-control @error('statusw4date') is-invalid @enderror"
                                name="statusw4date" id="statusw4date" placeholder="statusw4date" value="{{ \Carbon\Carbon::parse($data->statusw4date)->format('Y-m-d') }}">
                            @error('statusw4date')
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
