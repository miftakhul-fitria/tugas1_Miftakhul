@extends("layout")

@section("content")

	@if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

	<form action="{{ route('biodata.update', ['id' => $data->id]) }}" method="POST" class="form-horizontal">
		<!-- Laravel v5.5 ke bawah
		{{ csrf_field() }} -->
		
		<!-- Laravel v5.5 keatas -->
		@csrf
		<div class="form-group">
			<label class="control-label">Nama</label>
			<input type="text" class="form-control" name="name" value="{{ $data->name }}">
		</div>

		<div class="form-group">
			<label class="control-label">NIM</label>
			<input type="text" class="form-control" name="nim" value="{{ $data->nim }}">
		</div>

		<div class="form-group">
			<label class="control-label">Alamat</label>
			<textarea name="address" rows="10" class="form-control">{{ $data->address }}</textarea>
		</div>

		<!-- <div class="form-group">
			<label class="control-label">Foto</label><br>
			<img src="{{ asset('storage/photo-mhs/usY1IiCtqLzakPaUbfUUBsAvRv26K3zJhzlinzfQ.jpeg') }}" height="128">
			<input type="file" name="photo">
		</div> -->

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Simpan</button>
			<a href="{{ route('biodata.index') }}" class="btn btn-danger">
				Batal
			</a>
		</div>
	</form>
@endsection