<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Register</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <style type="text/css">
   .home {
     width: 500px;
     height: auto;
     margin: 50px auto;
    }

    .copy{
      font-size: 13px;
    }

    body{
      background-color: #84847C;
    }
    .text-center{
      font-family: lobster;
      padding: 30px 0 30px 0;
      background-color: rgb(27, 26, 26);
      font-size: 30px;
      text-align: center;
      color: white;
      border-radius: 6px 6px 0 0;
      margin-bottom: 50px;
    }

    .header{
      background-color: #fff;
      border-radius: 6px;    }
 </style>
</head>

<body>
  <div class="header">
 <div class="row home">
    <div class="col-md-12">
     <h3 class="text-center">Halaman Register Laravel</h3>
     <hr>
      <form>
        <div class="form-group">
            <label>Nama Lengkap</label>
           <input type="text" class="form-control" placeholder="Nama Lengkap">
         </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email">
         </div>

          <div class="form-group">
            <label>Password</label>
           <input type="password" class="form-control" placeholder="Password">
         </div>

          <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control" placeholder="Konfirmasi Password">
          </div>

          <p align="center"><a href="https://laravel.com/" class="btn btn-success">Daftar</a></p>

          <div class="copy">
            <p align="center">&copy Miftakhul Fitria | 183140714111084 | 2020</p>
          </div>
     </form>
   </div>
  </div>
  
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title> -->

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->        
        <!-- <style>
            html, body {
                background-color: #EA4A32;
                color: #ffffff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                color: #ffffff;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link:hover{
                color: #000066;
                
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
    <!-- </head> -->
    <!-- <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="../img/logoo.png">
                    Laravel
                </div>

                <div class="links">
                    <a class="link" href="https://laravel.com/docs">Docs</a>
                    <a class="link" href="https://laracasts.com">Laracasts</a>
                    <a class="link" href="https://laravel-news.com">News</a>
                    <a class="link" href="https://blog.laravel.com">Blog</a>
                    <a class="link" href="https://nova.laravel.com">Nova</a>
                    <a class="link" href="https://forge.laravel.com">Forge</a>
                    <a class="link" href="https://vapor.laravel.com">Vapor</a>
                    <a class="link" href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
 -->