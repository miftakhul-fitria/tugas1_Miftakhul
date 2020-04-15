@extends("layout")

@section("content")
	<h1>Daftar Mahasiswa</h1>
	<table class="table table-striped table-hover" id="datatable">
		<a href="{{ route('biodata.create') }}" class="btn btn-primary float-right">+Tambah Data</a>
		<a href="/biodata-mahasiswa/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
		<thead>
			<tr>
				<th>ID</th>
				<th>NAMA</th>
				<th>NIM</th>
				<!-- <th>FOTO</th> -->
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			@forelse($mahasiswa as $data)
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->name }}</td>
				<td>{{ $data->nim }}</td>
				<!-- <td>
					 <img src="{{ Storage::url($data->foto)}}" width="100dp">
				</td> -->
				<td>
					<a href="{{ route('biodata.show', ['id' => $data->id]) }}" type="button" class="btn btn-success">Detail</a>
					<a href="{{ route('biodata.edit', ['id' => $data->id]) }}" type="button" class="btn btn-warning">Edit</a>
					<a onclick="return confirm('Apakah Anda yakin ?');" href="{{ route('biodata.destroy', ['id' => $data->id]) }}" type="button" class="btn btn-danger">Delete</a>
				</td>
			</tr>

			<!-- Jika kosong -->
			@empty
			<tr>
				<td colspan="4">Data belum tersedia!</td>
			</tr>

			@endforelse
		</tbody>
	</table>
@endsection