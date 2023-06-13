<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="{{url('/css/style.css')}}">
</head>
<body>
  <div class="container">
    <form id="register-form" class="form" action="{{route('register')}}" method="post">
      <h2>Register</h2>
      @csrf
      @if(Session::has ('success'))
      <div class="success">{{Session::get('success')}}</div>
      @endif
      @if(Session::has ('fail'))
      <div class="success">{{Session::get('fail')}}</div>
      @endif

      <input type="text" name="firstName" placeholder="First Name" value="{{old('firstName')}}">
      <span class="error-message">@error('firstName') {{$message}} @enderror</span>

      <input type="text" name="lastName" placeholder="Last Name" value="{{old('lastName')}}">
      <span class="error-message">@error('lastName') {{$message}} @enderror</span>

      <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
      <span class="error-message">@error('email') {{$message}} @enderror</span>

      <input type="password" name="password" placeholder="Password" value="">
      <span class="error-message">@error('password') {{$message}} @enderror</span>

      <button type="submit">Register</button>

      <p>Already have an account? <a href="{{'/login'}}">Login</a></p>
    </form>
  </div>
</body>
</html>
