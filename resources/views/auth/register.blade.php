<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
         body {
         font-family: Arial, Helvetica, sans-serif;
         }
         * {
         box-sizing: border-box;
         }
         .container {
         padding: 16px;
         background-color: white;
         }
         input[type=text], input[type=password],input[type=phone_number] {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         display: inline-block;
         border: none;
         background: #f1f1f1;
         }
         input[type=text]:focus, input[type=password]:focus {
         background-color: #ddd;
         outline: none;
         }
         hr {
         border: 1px solid #f1f1f1;
         margin-bottom: 25px;
         }
         .registerbtn {
         background-color:#D8BFD8;
         color: white;
         padding: 16px 20px;
         margin: 8px 0;
         border: none;
         cursor: pointer;
         width: 50%;
         margin-left:25%;
         opacity: 0.9;
         }
         .registerbtn:hover {
         opacity: 1;
         }
         a {
         color: dodgerblue;
         }
         .signin {
         background-color: #f1f1f1;
         text-align: center;
         }
         .text-danger {
         color:red;
         }
      </style>
   </head>
   <body>
      <form method="post" action="{{ route('auth.create') }}">
         @csrf
         <div class="container">
            <div class="result">
               @if (Session::get('success'))
               <div class="alert alert-success">
                  {{ Session::get('success') }}
               </div>
               @endif
               @if (Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
               @endif
            </div>
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            
            <hr>
            <label for="name"><b>Name</b></label>
            <span class="text-danger"> @error('name'){{ $message }} @enderror </span>
            <input type="text" placeholder="Enter Name" name="name" id="name" value="{{ old('name') }}" > 
            
            <label for="phone_number"><b>Phone Number</b></label>
            <span class="text-danger"> @error('phone_number'){{ $message }} @enderror </span>
            <input type="phone_number" placeholder="Enter phone_number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" > 
            
            <label for="email"><b>Email</b></label>
            <span class="text-danger"> @error('email'){{ $message }} @enderror </span>
            <input type="text" placeholder="Enter Email" name="email" id="email" value="{{ old('email') }}" > 
            
            <label for="psw"><b>Password</b></label>
            <span class="text-danger"> @error('password'){{ $message }} @enderror </span>
            <input type="password" placeholder="Enter Password" name="password" id="password" >
            
            <button type="submit" class="registerbtn">Register</button>
         
         </div>
      </form>
   </body>
</html>