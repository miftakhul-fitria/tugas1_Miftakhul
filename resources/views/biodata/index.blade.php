@extends("layout")

@push("style")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
@endpush

@section("content")
    <h1>Daftar Mahasiswa</h1>
    <a href="{{ route('biodata.create') }}" class="btn btn-primary float-right" style="margin-bottom: 20px;">+Tambah Data</a>
    <a href="/biodata-mahasiswa/export_excel" class="btn btn-success my-3" target="_blank" style="margin-bottom: 20px;">EXPORT EXCEL</a>
    {!! $html->table() !!}
@endsection

@push("script")
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
    {!! $html->scripts() !!}
@endpush