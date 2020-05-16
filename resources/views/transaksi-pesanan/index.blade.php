@extends('layouts.master')

@push("style")
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('transaksi-pesanan/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi</a>

                    <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i> Filter Tanggal</a>
                </p>
            </div>

            <div class="box-body">
               <div class="table-responsive">
                   <table class="table table-hover myTable">
                       <thead>
                           <th>#</th>
                           <th>CUSTOMER</th>
                           <th>PAKET</th>
                           <th>STATUS PESANAN</th>
                           <th>STATUS PEMBAYARAN</th>
                           <th>BERAT</th>
                           <th>GRAND TOTAL</th>
                           <th>ACTION STATUS PESANAN</th>
                           <th>CETAK INVOICE</th>
                           <th>CREATED AT</th>
                           <th>ACTION</th>
                       </thead>
                       <tbody>
                           @foreach($data as $e=>$dt)
                           <tr>
                               <td>{{ $e+1 }}</td>
                               <td>{{ $dt->customers->nama }}</td>
                               <td>{{ $dt->pakets->nama }}</td>
                               <td>{{ $dt->status_pesanans->nama }}
                               </td>
                               <td>{{ $dt->status_pembayarans->nama }}</td>
                               <td>{{ $dt->berat }} Kg</td>
                               <td>Rp. {{ number_format($dt->grand_total) }}</td>
                               <td>
                                <div style="width: 60px">
                                  <center>
                                  <a href="{{ url('transaksi-pesanan/naikkan-status/'.$dt->id) }}" class="btn btn-success btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                  </center>

                                  <!-- <a href="{{ url('transaksi-pesanan/naikkan-pembayaran/'.$dt->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a> -->
                                </div>
                               </td>
                               <td>
                                 <div style="width: 60px">
                                  <center>
                                  <a href="{{ url('transaksi-pesanan/print/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-print"></i></a>
                                  </center>
                                </div>
                               </td>
                               <td>{{ date('d F Y',strtotime($dt->created_at)) }}</td>
                               <td>
                                <div style="width: 60px">
                                  <a href="{{ url('transaksi-pesanan/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                  <button href="{{ url('transaksi-pesanan/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                </div>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-gradient-danger">

      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <form role="form" action="{{ url('transaksi-pesanan/periode') }}" method="get">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dari Tanggal</label>
                  <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Sampai Tanggal</label>
                  <input type="text" class="form-control datepicker" id="exampleInputPassword1" placeholder="Samapi Tanggal" name="sampai" autocomplete="off" value="{{ date('Y-m-d') }}">
                </div>
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

        // btn filter
        $('.btn-filter').click(function(e){
          e.preventDefault();
          
          $('#modal-filter').modal();
        })
 
    })
</script>

@endsection

@push("script")
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush