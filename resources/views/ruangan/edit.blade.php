@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('ruangan.update', $ruangan->id) }}" method="post">
                @csrf
                @method('put')

            

              <div class="form-row">
                    <div class="col-md-12">
                      <div class="form-group">
                  <label for="ruangan">Ruangan</label>
                  <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="nama_ruangan"
                      id="ruangan" placeholder="Ruangan" autocomplete="off" required value="{{ $ruangan->nama_ruangan }}">
                  @error('ruangan')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="status">Kategori</label>
                          <select class="custom-select  @error('status') is-invalid @enderror" name="kategori"
                              id="status" required>
                              <option value="ruangan" @if ($ruangan->kategori == 'ruangan')
                                  selected
                              @endif>Ruangan</option>
                              <option value="kelas" @if ($ruangan->kategori == 'kelas')
                                  selected
                              @endif>Kelas</option>
                          </select>
                          @error('status')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
              </div>

  

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('ruangan.index') }}" class="btn btn-default">Back to list</a>

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
