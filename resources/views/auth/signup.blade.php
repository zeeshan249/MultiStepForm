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
  <h2>Sign Up</h2>
  @if (session('success'))
  <div class="alert alert-danger">
      {{ session('success') }}
  </div>
  @endif
  <form id="login-form" action="{{ route('confirmSignup') }}" method="POST" >
    @csrf
    <p>
    <input type="text" id="username" name="username" placeholder="Username" ><i class="validation"><span></span><span></span></i>
     @error('username')
    <span style="font-size:17px; color:brown; text-align:left">{{ $message }}</span>
     @enderror
    </p>
    <p>
    <input type="email" id="email" name="email" placeholder="Email Address" ><i class="validation"><span></span><span></span></i>
    @error('email')
    <span style="font-size:17px; color:brown; text-align:left">{{ $message }}</span>
     @enderror
    </p>

    <p>
      <input type="text" id="address" name="address" placeholder="Address" ><i class="validation"><span></span><span></span></i>
       @error('address')
      <span style="font-size:17px; color:brown; text-align:left">{{ $message }}</span>
       @enderror
      </p>

    <p>
      <select name="user_type" id="username" required>
        <option value="1">Admin</option>
        <option value="2">User</option>
      </select>
      
      </p>

      <p>
        <input type="password"  name="password" placeholder="password"><i class="validation"><span></span><span></span></i>
        @error('password')
        <span style="font-size:17px; color:brown; text-align:left">{{ $message }}</span>
         @enderror
        </p>
    <p>
    <input type="submit" id="login" value="Register">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
