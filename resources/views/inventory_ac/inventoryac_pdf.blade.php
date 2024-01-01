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
		<h5>Laporan Data Inventory AC</h4>
	</center>
 
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
                            
                        </tr>
                        <tr>
                            <th width="10%">Ada</th>
                            <th width="10%">Tidak Ada</th>
                        </tr>
                    </thead>

                    <tbody>
					@php
						$no = 1;
					@endphp
                        @foreach ($inventoryac as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->ruangans->nama_ruangan }}</td>
                                @if ($item->status == 'ada')
                                    <td>
                                        Yes
										
                                    </td>
                                    <td></td>
                                @else
                                    <td></td>
                                    <td>
                                        Yes
                                    </td>
                                @endif
                                <td>{{ $item->type }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->production_year)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->bought_year)->format('d-m-Y') }}</td>
                                <td>{{ $item->pk }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
 
</body>
</html>