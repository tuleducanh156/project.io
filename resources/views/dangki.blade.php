<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title> 
        <link rel="stylesheet" href="">
    </head>
    <body>

      <form method="post">
        @csrf
        name: <input type="text" name="name">
        <br>
        email: <input type="text" name="email">
        <br>
        password: <input type="password" name="password">
        <br>
        phone: <input type="number" name="phone">
        <br>
        message: <input type="text" name="message">
        <br>
        <button type="submit">Register</button>
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