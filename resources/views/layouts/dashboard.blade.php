<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>{{config('app.name')}} @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="{{ asset('css/style.css')  }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @stack('styles')
    
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="{{ route('dashboard.dashboard') }}"> Admin dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >

          <x-nav />   

        </ul>
        
        <ul class="navbar-nav ml-md-auto d-md-flex">
          
          <li class="nav-item dropdown">
            <span class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" >
              {{ Auth::user()->name }}
            </span>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}"  >
                  Profile
                </a>
              
              <form action="{{ route('logout') }}" method="POST" > 
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
              
          </li>
                      
          
        </ul>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">
            
      @yield('content')
 
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript"></script>
@stack('scripts')
</body>
</html>
