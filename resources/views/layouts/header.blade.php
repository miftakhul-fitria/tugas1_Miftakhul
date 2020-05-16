<!-- Logo -->
<?php
  $dt = \App\User::where('id',\Auth::user()->id)->first();
?>
<a class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>A</b>HL</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>{{ \Auth::user()->name }}</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <!-- Tasks: style can be found in dropdown.less -->
      
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{url('adminlte/dist/img/laundry3.jpg')}}" class="user-image" alt="User Image">
          <span class="hidden-xs">Happy Laundry</span>
        </a>

        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{url('adminlte/dist/img/laundry3.jpg')}}" class="img-circle" alt="User Image">

            <p>
              HAPPY LAUNDRY
              <small>since Des. 2016</small>
            </p>
          </li>

          <!-- Menu Footer-->
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-right">
              <a href="{{ url('keluar') }}" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>

</nav>