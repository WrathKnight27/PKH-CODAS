<!DOCTYPE html>
<html>
<head>
	<title>Laporan Hasil Seleksi Metode CODAS</title>
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
		<h4>Laporan Hasil Seleksi Metode CODAS</h4>
		<?php date_default_timezone_set('Asia/Jakarta'); $date = date('d-m-Y H:i:s'); ?>
		<p style="font-size: 9pt;">{{$date}}</p>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Nomor KK</th>
				<th>Nama KRT</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			@foreach($codasresults as $codasresult)
			<tr>
				<td>{{$codasresult->rank}}</td>
				<td>{{$codasresult->no_kk}}</td>
				<td>{{$codasresult->nama_krt}}</td>
				<td>{{$codasresult->Hi}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>