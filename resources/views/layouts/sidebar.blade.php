<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">

    <li class="menu-sidebar" style="margin-top: 5%;">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('adminlte/dist/img/laundry5.jpg')}}" class="img-circle" alt="User Image">
        </div>

        <div class="pull-left info">
          <p>Happy Laundry</p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    </li>

    <li class="header" style="margin-top: 7%;">MAIN NAVIGATION</li>

    <li class="menu-sidebar">
      <a href="{{ url('charts') }}">
        <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
      </a>
    </li>

    <li class="menu-sidebar">
      <a href="{{ url('/paket-laundry') }}">
        <i class="fa fa-firefox"></i>
          <span>Paket Laundry</span>
      </a>
    </li>

    <li class="menu-sidebar">
      <a href="{{ url('/customer') }}">
        <i class="fa fa-user"></i> 
          <span>Customer</span>
      </a>
    </li>

    <li class="menu-sidebar">
      <a href="{{ url('/status-pesanan') }}">
        <i class="fa fa-bars"></i> 
        <span>Status Pesanan</span>
      </a>
    </li>

    <li class="menu-sidebar">
      <a href="{{ url('/status-pembayaran') }}">
        <i class="fa fa-send"></i> 
        <span>Status Pembayaran</span>
      </a>
    </li>

    <li class="menu-sidebar">
      <a href="{{ url('/transaksi-pesanan') }}">
        <i class="fa fa-credit-card"></i> 
        <span>Transaksi Pesanan</span>
      </a>
    </li>

    <li class="menu-sidebar">
      <a href="{{ url('/export') }}">
        <i class="fa fa-print"></i>
        <span>Export Transaksi</span>
      </a>
    </li>

    <li class="header">OTHER</li>

    @if(\Auth::user()->name == 'Admin')
    <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li>
    @endif

    <li class="menu-sidebar">
      <a href="{{ url('/keluar') }}">
        <i class="glyphicon glyphicon-log-out"></i> 
        <span>Logout</span>
      </a>
    </li>

  </ul>
</section>