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
  <form id="login-form" action="{{route('confirmstep3')}}" method="POST" >
    @csrf
    <p>
    <input type="text" id="contact_name" name="contact_name" placeholder="Contact Name" required><i class="validation"><span></span><span></span></i>
     @error('company_name')
     <span style="font-size:10px; color:brown">
    
        {{ $message }}
    </span>
     @enderror
    </p>

    <p>
        <input type="email" id="contact_email" name="contact_email" placeholder="Contact Email" required><i class="validation"><span></span><span></span></i>
        @error('company_name')
        <span style="font-size:10px; color:brown">
       
           {{ $message }}
       </span>
        @enderror
       
     
        </p>
        <p>
            <input type="text" id="contact_phone" name="contact_phone" placeholder="Contact Phone" required><i class="validation"><span></span><span></span></i>
            @error('contact_email')
            <span style="font-size:10px; color:brown">
           
               {{ $message }}
           </span>
            @enderror
           
         
            </p>
    <p>
    <input type="submit" id="login" value="Final Submit">
    </p>
  </form>
  <div id="create-account-wrap">

  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
