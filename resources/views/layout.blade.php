<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sách truyện</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
        <script src="https://kit.fontawesome.com/0a09dca1f7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
          <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <link rel="shortcut icon" href="/css/images/favicon.ico" />


    </head>
    <body>
            @include('pages.header')
            @yield('sider')
            @yield('menu')
            @yield('content') 
            @include('pages.footer') 




    <script src="{{asset('js/app.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/jquery-1.6.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.jcarousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/functions.js')}}"></script>
    
    <script type="text/javascript">
      $('.select-chapter').change(function(){
        var url = $(this).val();
        if(url){
          window.location= url ;
        }
        return false;
      });
      current_chapter();
      function current_chapter(){
        var url  = window.location.href;
        $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
      }
    </script>

    </body>
</html>
