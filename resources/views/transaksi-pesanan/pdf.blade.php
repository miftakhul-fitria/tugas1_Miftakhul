<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<h1>{{ $nama_usaha->nama }}</h1>

	<div class="row">
		<div class="col-md-6">
			<table class="table table-hover">
				<tbody>
					<tr>
						<th>CUSTOMER</th>
						<td>:</td>
						<td>{{ $dt->customers->nama }}</td>
					</tr>

					<tr>
						<th>TANGGAL</th>
						<td>:</td>
						<td>{{ date('d F Y H:i:s',strtotime($dt->created_at)) }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>PAKET</th>
						<th>STATUS PESANAN</th>
						<th>STATUS PEMBAYARAN</th>
						<th>BERAT</th>
						<th>GRAND TOTAL</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>{{ $dt->pakets->nama }}</td>
						<td>{{ $dt->status_pesanans->nama }}</td>
						<td>{{ $dt->status_pembayarans->nama }}</td>
						<td>{{ $dt->berat }} Kg</td>
						<td>Rp. {{ number_format($dt->grand_total) }}</td>
					</tr>
				</tbody>

				<tfoot>
					<tr>
						<th colspan="4"><b><i>TOTAL</i></b></th>
						<td><b><i>Rp. {{ number_format($dt->grand_total) }}</i></b></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>