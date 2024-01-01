<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Kebersihan</h4>
	</center>
 
<table class="table table-bordered table-stripped" id="dataTableAC">
        <thead>
            <tr>
                <th width="3%" rowspan="3">No</th>
                <th rowspan="3">Nama</th>
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
            @php
                $no = 1;
            @endphp
            @foreach ($items as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                 
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
 
</body>
</html>