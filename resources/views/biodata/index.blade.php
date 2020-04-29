@extends("layout.app")

@push("style")
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section("content")
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0 text-dark">Daftar Mahasiswa</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Kelola Mahasiswa</a></li>
			<li class="breadcrumb-item active">Daftar Mahasiswa</li>
		</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('biodata.create') }}" class="btn btn-primary float-right" style="margin-bottom: 20px;">+Tambah Data</a>
                <a href="/biodata-mahasiswa/export_excel" class="btn btn-success" target="_blank" style="margin-bottom: 20px;">EXPORT EXCEL</a>
                {!! $html->table() !!}
            </div>
        </div>
    </div>
</section>
@endsection

@push("script")
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    {!! $html->scripts() !!}
@endpush