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
            <!-- CUSTOM -->        <link rel="stylesheet" href="{{ asset('css/portal/portal.css') }}">


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

    <!-- Page Wrapper -->
    <div id="wrapper">

      
      <nav class="navbar navbar-expand-md shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><h3>Foundation of Information Technology<br>
           <small>University of Colombo School of Computing</small> </h3>
          </a>
          <span id="ct" class="navbar-text text-white">
            
          </span>
              <span class="navbar-text text-white">
                {{ Auth::user()->name }}
              </span>
        </div>
      </nav>

      <!-- <nav class="navbar navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="{{ url('/') }}"><h3>Foundation of Information Technology<br>
          <small>University of Colombo School of Computing</small> </h3>
        </a>
        <span class="navbar-text">
          {{ Auth::user()->name }}
        </span>
      </nav> -->
      <!-- The sidebar -->
          <aside>
            <div class="sidebar">
              <img src="{{ asset('img/portal/avatar') }}/{{ Auth::user()->id }}.png" alt="Avatar" class="avatar">
              <p class="mb-0">Hello! {{ Auth::user()->name }}</p>
              <p><small>{{ Auth::user()->role->name }}</small> </p>
              <hr style="background-color:aliceblue;"> 
              <ul class="sidebar" style="height: 100%;">
                <li>
                  <a href="#home">Dashboard</a>
                </li>
                <li>            
                  <a href="#news">Students</a>
                </li>
                <li>            
                  <a href="#news">Exams</a>
                </li>
                <li>            
                  <a href="#news">Results</a>
                </li>
                <li>            
                  <a href="#news">Users</a>
                </li>
                <li>            
                  <a href="#news">System</a>
                </li>
                <li style="position:fixed; bottom: 0; width:200px">
                  <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
                
              </ul>
            </div>
          </aside>

          
          <main class="pt-5">

            <div class="contentr pt-4 mt-5" style="margin-left: 200px;">
              
            @yield('content')
            </div>

          </main>
    </div>
</body>
</html>

