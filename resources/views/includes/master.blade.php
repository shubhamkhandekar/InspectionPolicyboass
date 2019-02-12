<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>INSPECTION | Policyboss </title>
    @include('includes.head')
    
</head>
 
 
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
            
            @include('includes.header')
           
            @yield('content')
 

 </div>
 </div>          
          @include('includes.footer')
          @include('includes.script')
  
</body>
</html>
