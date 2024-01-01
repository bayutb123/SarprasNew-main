@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('inventory_ac.create') }}" class="btn btn-primary mb-3 mr-3">New AC Inventory</a>
    <a href="{{ route('inventoryac.cetak_pdf') }}" class="btn btn-danger mb-3">Cetak Pdf</a>

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
            
                <table class="table table-bordered table-stripped" id="dataTableAC">
                    <thead>
                        <tr>
                            <th scope="col" width="3%" rowspan="2">No</th>
                            <th rowspan="2" width="5%">Ruang Kelas</th>
                            <th colspan="2">AC</th>
                            <th rowspan="2" width="10%">Jenis</th>
                            <th rowspan="2" width="10%">Tahun Produksi</th>
                            <th rowspan="2" width="10%">Tahun Pengadaaan</th>
                            <th rowspan="2" width="5%">Jumlah PK</th>
                            <th rowspan="2" width="10%">Aksi</th>
                        </tr>
                        <tr>
                            <th width="10%">Ada</th>
                            <th width="10%">Tidak Ada</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($items as $index => $item)
                            <tr>
                                <td>{{ $index + $items->firstItem() }}</td>
                                <td><a style="font-weight: bold" href="{{ route('inventory_ac.edit', $item) }}">{{ $item->ruangans->nama_ruangan }}</a></td>
                                @if ($item->status == 'ada')
                                    <td>
                                        <i class="fas fa-check"></i>
                                    </td>
                                    <td></td>
                                @else
                                    <td></td>
                                    <td>
                                        <i class="fas fa-check"></i>
                                    </td>
                                @endif
                                <td>{{ $item->type }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->production_year)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->bought_year)->format('d-m-Y') }}</td>
                                <td>{{ $item->pk }}</td>
                                <td>
                                    

                                    <form action="{{ route('inventory_ac.destroy', $item->id) }}" method="post"
                                            class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">delete</button>
                                        </form>
                                   
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                 {{ $items->links() }}
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
