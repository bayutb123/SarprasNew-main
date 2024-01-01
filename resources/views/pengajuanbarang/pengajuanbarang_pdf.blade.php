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
		<h5>Laporan Data Pengajuan Barang</h4>
	</center>
 
	<table class="table table-bordered table-stripped">
                    <thead>
                        
                        <tr>
                            <th scope="col" width="3%" rowspan="2">No</th>
                            <th rowspan="2" width="5%">Nama Barang Yang Di Ajukan</th>
                            <th rowspan="2" width="10%">Banyak Barang</th>
                            <th rowspan="2" width="10%">Harga Satuan</th>
                            <th rowspan="2" width="10%">Jumlah</th>
                            <th colspan="2">Sudah Dilaporkan</th>
                            <th rowspan="2" width="10%">Sudah Ada Tanggal</th>
                            <th rowspan="2" width="10%">Belum Ada Tanggal</th>
                            <th rowspan="2" width="10%">Keterangan</th>
                           
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

                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $row->nama }} </td>
                                <td>{{ $row->banyak_barang }} </td>
                                <td>{{ $row->harga_satuan }} </td>
                                <td>{{ $row->jumlah }} </td>

                                @if ($row->lapor_kapsek == 'yes')
                                    <td>
                                       Yes
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                @if ($row->lapor_yayasan == 'yes')
                                    <td>
                                       Yes
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                @if ($row->tanggal != NULL)
                                    <td>{{ $row->tanggal }}</td>
                                @else
                                     <td></td>
                                @endif

                                @if ($row->tanggal == NULL)
                                   <td> Yes </td>
                                @else
                                 <td></td>


                                @endif
                                

                                <td>{{ $row->keterangan }} </td>

                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
 
</body>
</html>