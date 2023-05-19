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

    <a target="_blank" id="login" href="{{ route('confirmDownloadPDF') }}">Download Pdf </a>
 

  
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
