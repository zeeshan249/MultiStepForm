<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>
<body>
 
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-button">Logout</button>
    </form>

<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Multi Step Form</h2>
  <form id="login-form" action="{{ route('confirmstep2') }}" method="POST" >
    @csrf
    <p>
    <input type="text" id="country_name" name="country_name" placeholder="Country Name" required><i class="validation"><span></span><span></span></i>
     @error('company_name')
     <span style="font-size:10px; color:brown">
    
        {{ $message }}
    </span>
     @enderror
    </p>

       <p>
        <input type="text" id="city_name" name="city_name" placeholder="City" required><i class="validation"><span></span><span></span></i>
        @error('city')
        <span style="font-size:10px; color:brown">
           {{ $message }}
       </span>
        @enderror
       
     
        </p>
        <p>
            <input type="text" id="website_name" name="website_name" placeholder="Website" required><i class="validation"><span></span><span></span></i>
            @error('website')
            <span style="font-size:10px; color:brown">
           
               {{ $message }}
           </span>
            @enderror
           
         
            </p>
    <p>
    <input type="submit" id="login" value="Next Step 3">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="{{route('signup')}}">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
