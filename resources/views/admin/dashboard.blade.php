<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>
<body>
 
    <form action="{{ route('adminlogout') }}" method="POST">
        @csrf
        <button class="logout-button">Logout</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>User Filled Upto</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name??''}}</td>
                <td>{{$user->email??''}}</td>
                @if   (empty($user->company_name) && empty($user->company_stage) && empty($user->company_phone))
                <td>User Not Stated Filling Up</td>
                @elseif(empty($user->country_name) && empty($user->city_name) && empty($user->website_name))
                <td>1st Form Filled</td>
                @elseif(empty($user->contact_name) && empty($user->contact_email) && empty($user->contact_address))
                <td>2nd Form Filled</td>
                @else
                <td>Third And Final Form Filled</td>
                @endif



            @if   (empty($user->company_name) && empty($user->company_stage) && empty($user->company_phone))
            <td>Form Incomplete</td>
            @elseif(empty($user->country_name) && empty($user->city_name) && empty($user->website_name))
            <td>Form Incomplete</td>
            @elseif(empty($user->contact_name) && empty($user->contact_email) && empty($user->contact_address))
            <td>Form Incomplete</td>
            @else
            <td>
                <a target="_blank" class="logout-button" href="{{ route('confirmIndividualDownloadPDF',['userId' => $user->userId]) }}">
                    Download PDF
                </a>
            </td>
            @endif
         
            </tr>   
            @endforeach
    
           
        </tbody>
    </table>
</body>
</html>








</body>
</html>
