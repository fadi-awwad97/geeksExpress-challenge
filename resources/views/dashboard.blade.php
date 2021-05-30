<!DOCTYPE html>
<html>
   <style>
      body {
      font-family: Arial, Helvetica, sans-serif;
      }
      .header {
      overflow: hidden;
      /* background-image: linear-gradient(to right, red , yellow,blue,black); */
      background-color:#FFFF66;
      padding: 20px 10px;
      border-radius: 0 0 85% 85% / 24%;
       box-shadow: 10px 10px 5px grey;
       margin-bottom:15px;
      }
      a {
      float: left;
      color: black;
      text-align: center;
      padding: 12px;
      text-decoration: none;
      font-size: 18px; 
      line-height: 25px;
      border-radius: 4px;
      }
      a:hover {
      background-color: #ddd;
      color: black;
      }
      a.active {
      background-color: dodgerblue;
      color: white;
      } 
      .header-right {
      float: right;
      }

      .buttonWrapper {
      display: flex;
      align-items: center;
      justify-content: center; 
      }
      }
      .title {
      font-size: 25px;
      font-weight: bold;
      text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
      color:pink;
      }
      .form {
      text-align: center;
      vertical-align : middle;
      }
      .input {
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      .image{
      /* display: block; */
      margin-left: auto;
      margin-right: auto;
      width: 10%;
      }
      .buttonWrapper{
      width:100%;
      display: flex;
      align-items: center;
      justify-content: center;
      }
      .logout {
      cursor: pointer;
      width: 100px;
      height: 20px;
      border-radius: 10px;
      font-size: 1.5rem;
      font-weight: 600;
      /* background-image: linear-gradient(red, yellow,blue,black); */
      background-color:#696969;
      }
      .submit {
      cursor: pointer;
      width: 100px;
      height: 50px;
      font-size: 1rem;
      font-weight: 600;
      background-color:#B0E0E6;
      }
      .submit:hover {
         box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
      }
      .message{
        
        justify-content:center;
        align-items:center;
        direction:flex;
        margin-left:13%;
      }
      .user-msg{
        margin-left:30%
      }

    @media screen and (max-width: 500px) {
      .title {
      text-align: center;
      }
      .message {
            justify-content:center;
        align-items:center;
        direction:flex;
        margin-right:13%;
      }
      .user-msg{
        margin-right:30%
      }
    }
   </style>
   <head>
      <title>Dashboard</title>
   <body>
      <div class="header">
         <h1 class="title">Welcome {{ $LoggedUserInfo->name ?? '' }}</h1> 
         <img class="image" src="/images/geeklogo.png"></img>
         <div class="header-right"> 
 
 <div class="buttonWrapper">
         <a class="logout" href="signout">Logout</a>
      </div>
         </div>
      </div>
      @if( $LoggedUserInfo->name === 'admin' )

          @if (Session::get('success'))
          <div style="color:green" class="alert alert-success">
              {{ Session::get('success') }}
          </div>
          @endif 

      <form class="form" method="post" action="{{ route('auth.submit') }}">
         @csrf
         
         <div >
            <label for="phone_number"><b>Insert Phone Number To Send A Message</b></label>
            <input class="input" type="phone_number" placeholder="Enter Phone Number" name="phone_number" id="phone_number"  > 
            <span class="text-danger"> @error('phone_number'){{ $message }} @enderror </span>
         </div>
         
         <div class="message">
            <label  for="message"><b>Insert The Message</b></label>
            <input class="input" type="message" placeholder="Enter Message" name="message" id="message" >
            <span class="text-danger"> @error('message'){{ $message }} @enderror </span>
         </div>
         
         <button type="submit" class="submit">Submit</button>
         
        @else
         <div class="user-msg"> if you were chosen by admin , you will recieve congrats message soon</div>
      </form>
      @endif
      
      
     
   </body>
</html>