@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('ruangan.create') }}" class="btn btn-primary mb-3 mr-3">Tambah Ruangan</a>
    <a href="{{ route('ruangan.cetak_pdf') }}" class="btn btn-danger mb-3">Cetak Pdf</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Ruangan</td>
                            <td>Kategori</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($data as $index => $row)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td>{{ $row->nama_ruangan }} </td>
                                <td>{{ $row->kategori }} </td>
                                
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('ruangan.edit', $row->id) }}"
                                            class="btn btn-primary me-3">edit</a>
                                            

                                        <form action="{{ route('ruangan.destroy', $row->id) }}" method="post"
                                            class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
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
