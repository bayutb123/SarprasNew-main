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
		<h5>Laporan Data Kerusakan AC</h4>
	</center>
 
	<table class="table table-bordered table-stripped">
                    <thead>
                       <tr>
                            <td>No</td>
                            <td>Ruangan</td>
                            <td>Jenis Ac</td>
                            <td>Jumlah</td>
                            <td>Tanggal</td>
                            <td>Kerusakan</td>
                            <td>Penanganan</td>
                            <td>Paraf Teknisi</td>
                            <td>Paraf Waka Humsas</td>
                            <td>Paraf Kepala Sekolah</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->ruangans->nama_ruangan }} </td>
                                <td>{{ $row->jenis_ac }} </td>
                                <td>{{ $row->jumlah }} </td>
                                <td>{{ $row->tanggal }} </td>
                                <td>{{ $row->kerusakan }} </td>
                                <td>{{ $row->penanganan }} </td>
                                <td>{{ $row->paraf_teknis }} </td>
                                <td>{{ $row->paraf_maka_humsas }} </td>
                                <td>{{ $row->paraf_kepala_sekolah }} </td>
                              
                            </tr>
                        @endforeach
                    </tbody>
                </table>
 
</body>
</html>