<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo/fav.png') }}">

    <title>FIT -Portal</title>
    

        <!-- STYLES -->
            <!-- BOOTSTRAP -->      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <!-- FONT AWESOME -->   <link rel="stylesheet" href="{{ asset('lib/font-awesome/css/all.css') }}">
            <!-- LINE AWESOME -->   <link rel="stylesheet" href="{{ asset('lib/line-awesome/css/line-awesome.css') }}">
            <!-- ANIMATE -->        <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}">
            <!-- CUSTOM -->        <link rel="stylesheet" href="{{ asset('css/portal/core.css') }}">


       <!-- JavaScript Libraries -->
        
        <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
        <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>

        <script type="text/javascript"> 
          function display_c(){
            var refresh=999; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct()',refresh)
          }
          
          function display_ct() {
            var dt = new Date()
            var timeString = dt.getFullYear() +  "/" + dt.getMonth() + "/" + dt.getDate() + "   " + dt.getHours() + ":" + dt.getMinutes() +":" + dt.getSeconds()
            document.getElementById('ct').innerHTML = timeString;
            display_c();
          }
        </script>

    
</head>

<body onload=display_ct();>

    <!-- Page container-fluid -->
    <div class="container-fluid">
      <div class="row">

        <!-- SIDE BAR -->
        <div class="col-lg-2 sidebar vh-100">
          <div class="row">

            <!-- USER DETAILS SECTION -->
            <div class="user w-100 text-center">
              <div class="img mt-5 mb-2">
                <img src="{{ asset('img/portal/avatar') }}/{{ Auth::user()->id }}.png" alt="Avatar" class="avatar" width="50%">
              </div>
              <p class="mb-0 text-white">Hello! {{ Auth::user()->name }}</p>
              <p class="text-white"><small>{{ Auth::user()->role->name }}</small> </p>
            </div>
            <!-- /USER DETAILS SECTION -->

            <hr width="90%"/> 

            <!-- MENU SECTION -->
            <div class="nav-menu w-100">
              <ul>
                <li><a href="#home">Dashboard</a></li>
                <li><a href="#news">Students</a></li>
                <li><a href="#news">Exams</a></li>
                <li><a href="#news">Results</a></li>
                <li><a href="#news">Users</a></li>
                <li><a href="#news">System</a></li>
                <li style="bottom: 0px;">
                  <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
              </ul>

            </div>
            <!-- /MENU SECTION -->

          </div>
        </div>
        <!-- /SIDE BAR -->

        <!-- PAGE AREA -->
        <div class="col-lg-10">
          <div class="row">

            <!-- NAV BAR -->
            <div class="col-lg-12 nav-bar">
              <div class="row">

                <div class="col-lg-4">                  
                  <a class="navbar-brand" href="{{ url('/') }}"><h3>Foundation of Information Technology<br>
                    <small>University of Colombo School of Computing</small> </h3>
                  </a>
                </div>

                <div class="col-lg-4 text-center">
                    <span id="ct" class="navbar-text text-white"></span>
                </div>

                <div class="col-lg-4 text-right"> 
                  <span class="navbar-text text-white">{{ Auth::user()->name }}</span>
                </div>

              </div>
            </div>
            <!-- /NAV BAR -->
          </div>
        </div>
        <!-- PAGE AREA -->

      </div>
    </div>
    <!-- /Page container-fluid -->
</body>
</html>

{{-- <!-- PAGE AREA -->
        <div class="col-lg-10">
          <div class="row">

            <!-- NAV BAR -->
            <div class="navbar">
              <div class="col-lg-4">                  
                <a class="navbar-brand" href="{{ url('/') }}"><h3>Foundation of Information Technology<br>
                  <small>University of Colombo School of Computing</small> </h3>
                </a></div>
              <div class="col-lg-4 text-center">
                  <span id="ct" class="navbar-text text-white"></span>
              </div>
              <div class="col-lg-4 text-right"> 
                <span class="navbar-text text-white">
                  {{ Auth::user()->name }}
                </span>
              </div>
            </div>
          </div>
          <!-- /NAV BAR -->

          <main class="col-lg-12 mt-5">
            <div class="row">
                  @yield('content')
            </div>
          </main>

          </div>
        </div>
        <!-- /PAGE AREA -->


      </div> --}}
          

