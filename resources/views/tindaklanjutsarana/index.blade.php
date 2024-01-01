@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tindak Lanjut Sarana</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('tindaklanjutsarana.create') }}" class="btn btn-primary mb-3 mr-3">Tambah Tindak Lanjut Sarana</a>
    <a href="{{ route('tindaklanjutsarana.cetak_pdf') }}" class="btn btn-danger mb-3">Cetak Pdf</a>

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
                            <th scope="col" width="3%" rowspan="2">No</th>
                            <th rowspan="2" width="5%">Ruangan</th>
                            <th rowspan="2" width="10%">Nama Barang</th>
                            <th rowspan="2" width="10%">Kerusakan</th>
                            <th rowspan="2" width="10%">Tanggal</th>
                            <th colspan="2">Sudah Dilaporkan</th>
                            <th rowspan="2" width="10%">Sudah Diperbaiki Tanggal</th>
                            <th rowspan="2" width="10%">Belum Diperbaiki Tanggal</th>
                            <th rowspan="2" width="10%">Keterangan</th>
                            <th rowspan="2" width="10%">Aksi</th>
                        </tr>
                        <tr>
                            <th width="10%">Kepala Sekolah</th>
                            <th width="10%">Yayasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($data as $index => $row)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td>{{ $row->ruangans->nama_ruangan }} </td>
                                <td>{{ $row->nama_barang }} </td>
                                <td>{{ $row->kerusakan }} </td>
                                <td>{{ $row->tanggal }} </td>
                               

                                @if ($row->lapor_kapsek == 'yes')
                                    <td>
                                        <i class="fas fa-check"></i>
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                @if ($row->lapor_yayasan == 'yes')
                                    <td>
                                        <i class="fas fa-check"></i>
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                @if ($row->tanggal_perbaikan != NULL)
                                    <td>{{ $row->tanggal_perbaikan }}</td>
                                @else
                                     <td></td>
                                @endif

                                @if ($row->tanggal_perbaikan == NULL)
                                   <td> <i class="fas fa-check"></i> </td>
                                @else
                                 <td></td>


                                @endif
                                

                                <td>{{ $row->keterangan }} </td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('tindaklanjutsarana.edit', $row->id) }}"
                                            class="btn btn-primary me-3">edit</a>
                                            

                                        <form action="{{ route('tindaklanjutsarana.destroy', $row->id) }}" method="post"
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
