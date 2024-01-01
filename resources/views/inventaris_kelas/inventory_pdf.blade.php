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
		<h5>Laporan Data Invetaris kelas</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col" width="3%" rowspan="2">No</th>
				<th rowspan="2" width="5%">Ruang Kelas</th>
				<th rowspan="2" width="10%">Nama Barang</th>
				<th rowspan="2" width="10%">Jumlah</th>
				<th colspan="2">Kondisi</th>
			
			</tr>
			<tr>
				<th width="10%">Baik</th>
				<th width="10%">Buruk</th>
			</tr>
		</thead>
		<tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($inventory as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->ruangans->nama_ruangan }} </td>
                                <td>{{ $row->nama_barang }} </td>
                                <td>{{ $row->jumlah }} </td>
                                @if ($row->kondisi == 'baik')
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

                               
                            </tr>
                        @endforeach
        </tbody>
	</table>
 
</body>
</html>