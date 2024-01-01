@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('kebersihan_outdoor.create.period', ['id' => $period->id]) }}" class="btn btn-primary mb-3 mr-3">New Data</a>
    <a href="{{ route('kebersihan_outdoor.cetak_pdf') }}" class="btn btn-danger mb-3">Cetak Pdf</a>


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
                <th width="3%" rowspan="3">No</th>
                <th rowspan="3">Nama</th>
                <th rowspan="3">Aksi</th>
                <th colspan="8">Hari/Tanggal</th>
            </tr>
            <tr>
                <th colspan="2">Minggu Ke-1</th>
                <th colspan="2">Minggu Ke-2</th>
                <th colspan="2">Minggu Ke-3</th>
                <th colspan="2">Minggu Ke-4</th>
            </tr>
            <tr>
                <th width="10%">Bersih</th>
                <th width="10%">Tidak Bersih</th>
                <th width="10%">Bersih</th>
                <th width="10%">Tidak Bersih</th>
                <th width="10%">Bersih</th>
                <th width="10%">Tidak Bersih</th>
                <th width="10%">Bersih</th>
                <th width="10%">Tidak Bersih</th>
                

            </tr>
            
            
        </thead>

        <tbody>
            @foreach ($items as $index => $item)
            <tr>
                <td>{{ $index + $items->firstItem() }}</td>
                <td>{{ $item->name }}</td>
                 <td>
                        <a href="{{ route('kebersihan_outdoor.period_edit', $item->id) }}" class="btn btn-primary me-3">edit</a>
                        <form action="{{ route('kebersihan_outdoor.destroy', $item->id) }}" method="post"
                            class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                @if ($item->statusw1 == 'Bersih')
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw1date }})</i>
                    </td>
                    <td></td>
                @elseif ($item->statusw1 == 'Tidak Bersih')
                    <td></td>
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw1date }})</i>
                    </td>
                @else 
                    <td></td>
                    <td></td>
                @endif
                @if ($item->statusw2 == 'Bersih')
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw2date }})</i>
                    </td>
                    <td></td>
                @elseif ($item->statusw2 == 'Tidak Bersih')
                    <td></td>
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw2date }})</i>
                    </td>
                @else 
                    <td></td>
                    <td></td>
                @endif
                @if ($item->statusw3 == 'Bersih')
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw3date }})</i>
                    </td>
                    <td></td>
                @elseif ($item->statusw3 == 'Tidak Bersih')
                    <td></td>
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw3date }})</i>
                    </td>
                @else 
                    <td></td>
                    <td></td>
                @endif
                @if ($item->statusw4 == 'Bersih')
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw4date }})</i>
                    </td>
                    <td></td>
                @elseif ($item->statusw4 == 'Tidak Bersih')
                    <td></td>
                    <td>
                        <i class="fas fa-check"> ({{ $item->statusw4date }})</i>
                    </td>
                @else 
                    <td></td>
                    <td></td>
                @endif
                   

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
