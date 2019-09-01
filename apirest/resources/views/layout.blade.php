<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}" rel="stylesheet">
         <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/angular.min.js') }}"></script>
        <script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script  src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
 


           </head>
    <body ng-app="App" ng-controller="Ctroller">
        <div id="main">
  <div class="container">
    <nav>
      <div class="nav-xbootstrap">
        <h4 style="color: white"> Gestion de  Usuarios</h4>
      </div>
      
    </nav>
    <div class='content'>
        @yield('content')
    </div>
</div>
</div>
    </body>
</html>
