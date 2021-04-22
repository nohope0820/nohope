<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{ asset('view/login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('view/login/css/main.css') }}">
<!--===============================================================================================-->

<style>
    .container-login100{
        
        background-image: url("{{ asset('view/login/images/bg-01.jpg') }}");
    }
    </style>
</head>
<body>
  
 
      
         


       
  <div class="limiter">
    <div class="container-login100">
    
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div style="border: 4px solid green; width: 178px; margin: auto; padding: 3px 15px;"><a href="{{ url('home') }}"><img src="{{ asset('view/login/images/tai-xuong.png') }}" width="140"></a></div>
          <span class="login100-form-title p-b-49" style="font-size: 16px; font-family: times new roman; font-weight: bold; padding-top: 25px;">
            TẠO TÀI KHOẢN
          </span>
          @if ($errors->any())
          <ul class="notify">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
         </ul>
         @endif
            <div class="wrap-input100 validate-input m-b-23" data-validate="Name is required">
         
           <input class="input100" type="name" name="name" required="" placeholder="Nhập tên của bạn" style="font-size: 16px; font-family: times new roman;">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
            
            <input class="input100" type="text" name="email" required="" placeholder="Nhập địa chỉ email của bạn" style="font-size: 16px; font-family: times new roman">
            <span class="focus-input100" data-symbol="&#xf209;"></span>
            
          </div>
          
          
          <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
           
            <input class="input100" type="password" name="password" required="" placeholder="Nhập mật khẩu của bạn" style="font-size: 16px; font-family: times new roman">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
           
            <input class="input100" type="password" name="password_confirmation" required="" placeholder="Nhập lại mật khẩu của bạn" style="font-size: 16px; font-family: times new roman">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

         
      
          
          <div class="container-login100-form-btn"  style="padding-top: 35px;width: 300px; margin: auto;">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              
                <input type="submit" class="login100-form-btn" value="Đăng kí" style="color: black; background: linear-gradient(to right, blue, pink);">
              
            </div>
          </div>
</form>

          <div class="flex-col-c p-t-155">
            <span class="txt1 p-b-17">
             Hoặc đăng nhập
            </span>

            <a href="{{ route('login') }}" class="txt2">
              Đăng nhập
            </a>
          </div>
        
      </div>
    </div>
  </div>
  <style type="text/css">
    a:hover {
  text-decoration: none;
  color: #a64bf4;
  text-decoration: underline;
}

  </style>
  <style>
    .notify > li{font-family: 'Times New Roman', Times, serif;
    color: red;}
    </style>

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script href="{{ asset('view/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
  <script href="{{ asset('view/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
  <script href="{{ asset('view/login/vendor/bootstrap/js/popper.js') }}"></script>
  <script href="{{ asset('view/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
  <script href="{{ asset('view/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
  <script href="{{ asset('view/login/vendor/daterangepicker/moment.min.js') }}"></script>
  <script href="{{ asset('view/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
  <script href="{{ asset('view/login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('js/main.js') }}"></script>

 

</body>
</html>
