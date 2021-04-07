<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title> 
        <link rel="stylesheet" href="">
    </head>
    <body>
      <a href="{{url('/dangki/')}}">Nếu bạn chưa có tài khoản vui lòng kick vào đăng kí</a>
      <form method="get">
        @csrf
        email: <input type="text" name="email">
        <br>
        password: <input type="password" name="password">
        <br>
        <button type="submit">Send</button>
        {{$errors or''}}
      </form>
      @if ($errors->any())
      <div class=" alert alert-danger">
      <ul> 
          @foreach($errors->all() as $errors)
          <li>{{$errors}}</li>
          @endforeach
      </ul>
      </div>
      @endif
    </body>
</html>