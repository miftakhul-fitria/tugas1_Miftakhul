<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="menu-sidebar"><a href="{{ url('/paket-laundry') }}"><span class="fa fa-firefox"></span> Paket Laundry</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-user"></span> Customer</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status-pesanan') }}"><span class="fa fa-bars"></span> Status Pesanan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status-pembayaran') }}"><span class="fa fa-send"></span> Status Pembayaran</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/transaksi-pesanan') }}"><span class="fa fa-credit-card"></span> Transaksi Pesanan</span></a></li>

        <li class="header">OTHER</li>

        @if(\Auth::user()->name == 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>