@extends("layout")

@section("content")
	<ul>
		<li>ID : {{ $data->id }}</li>
		<li>Nama : {{ $data->name }} </li>
		<li>NIM : {{ $data->nim }} </li>
		<li>Alamat : {{ $data->address }} </li>
		<li>File Path : {{ $data->photo }} </li>
		<li>Gambar : </li>

		<li><img src="{{ Storage::url($data->photo) }}" height="150px"></li>
	</ul>

	<a href="{{ route('biodata.index') }}">Kembali</a>
@endsection