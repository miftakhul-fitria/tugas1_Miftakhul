@extends('layouts.master')

@push("style")
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endpush

@section('content')
  <div class="container">
   <h2><center>Dashboard Admin</center></h2>
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Persentase Total Transaksi</h3>
    </div>
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
@endsection
 
@section('scripts')
<script type="text/javascript">
   var analytics = <?php echo $grand_total; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Diagram Persentase Total Transaksi Customer'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
@endsection

@push("script")
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush