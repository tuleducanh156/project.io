<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title> 
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script> CKEDITOR.replace('demo'); </script>

    </head>
    <body>
      {{--gọi code trang header--}}
        @include('master.header')

      {{--Nơi chứa nội dung thay đổi--}}
        @yield('content')
        
      {{--gọi code trang footer--}}
        @include('master.footer')
      
    </body>
</html>