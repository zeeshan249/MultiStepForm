<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2> Admin Login</h2>
  <form id="login-form" action="{{route('confirmAdminLogin')}}" method="POST" >
    @csrf
 
    <p>
    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
     @error('email')
     <span style="font-size:10px; color:brown">
    
        {{ $message }}
    </span>
     @enderror
    </p>

    <p>
        <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
       
     
        </p>
    <p>
    <input type="submit" id="login" value="Login">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="{{route('signup')}}">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
