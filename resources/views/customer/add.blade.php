@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <a href="{{ url('customer') }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>

            <div class="box-body">
              <form role="form" method="POST" action="{{ url('customer/add') }}">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">No HP</label>
                    <input type="number" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="No HP">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="5"></textarea>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
   
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Check me out
                    </label>
                  </div> -->
                </div>
                <!-- /.box-body -->
   
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection