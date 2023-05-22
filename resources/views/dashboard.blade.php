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
  <form id="login-form" action="{{ route('confirmstep1') }}" method="POST" >
    @csrf
    <p>
    <input type="text" id="company_name" name="company_name" placeholder="Company Name" required><i class="validation"><span></span><span></span></i>
     @error('company_name')
     <span style="font-size:10px; color:brown">
    
        {{ $message }}
    </span>
     @enderror
    </p>

    <p>
        <input type="text" id="company_stage" name="company_stage" placeholder="Company Stage" required><i class="validation"><span></span><span></span></i>
        @error('company_name')
        <span style="font-size:10px; color:brown">
       
           {{ $message }}
       </span>
        @enderror
       
     
        </p>
        <p>
            <input type="text" id="company_phone" name="company_phone" placeholder="Company Phone" required><i class="validation"><span></span><span></span></i>
            @error('company_phone')
            <span style="font-size:10px; color:brown">
           
               {{ $message }}
           </span>
            @enderror
           
         
            </p>
    <p>
    <input type="submit" id="login" value="Next Step 2">
    </p>
  </form>
  <div id="create-account-wrap">
  
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
