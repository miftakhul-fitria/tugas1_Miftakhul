@extends('layouts.master')

@section('content')

		<h1>Show Student Data</h1>
		<!-- Fungsi succes Add Data -->
		@if(session('success'))
		<div class="alert alert-success" role="alert">
			{{session('success')}}
		</div>
		@endif

		<div class="row">
			<div class="col-lg-12">
				<form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="exampleInputEmail1">First Name</label>
						<input name="first_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" value="{{$mahasiswa->first_name}}" disabled="disabled">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Last Name</label>
						<input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" value="{{$mahasiswa->last_name}}" disabled="disabled">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Choose Gender</label>
						<select name="gender" class="form-control" id="exampleFormControlSelect1" disabled="disabled">
							<option value="Male" @if($mahasiswa->gender == 'Male') selected @endif>Male</option>
							<option value="Female" @if($mahasiswa->gender == 'Female') selected @endif>Female</option>
						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Religion</label>
						<input name="religion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Religion" value="{{$mahasiswa->religion}}" disabled="disabled">
					</div>

					 <div class="form-group">
					 	<label for="exampleFormControlTextarea1">Address</label>
					 	<textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Address" disabled="disabled">{{$mahasiswa->address}}</textarea>
					 </div>

					 <button type="submit" class="btn btn-secondary">Close</button>
				</form>
			</div>
		</div>

@endsection