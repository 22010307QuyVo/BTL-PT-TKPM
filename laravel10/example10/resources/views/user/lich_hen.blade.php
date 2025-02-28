<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> 09876534234</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> one-health-mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Tìm hiểu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Bác sĩ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">Tin tức</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Liên lạc</a>
            </li>

            @if(Route::has('login'))

            @auth

            <li class="nav-item">
                <a class="nav-link" style="background-color:aquamarine" href="{{ url('lichhen') }}">Lịch Hẹn</a>
              </li>

                <x-app-layout>
        
                </x-app-layout>
                
            @else 
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Đăng ký</a>
              </li>

            @endauth

            @endif

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div align="center" style="padding: 70px;">

    <table>

        <tr style="background-color: rgb(110, 196, 231)">
            <th style="padding: 10px; font-size: 20px; color:black">Bệnh nhân</th>
            <th style="padding: 10px; font-size: 20px; color:black">Bác Sĩ</th>
            <th style="padding: 10px; font-size: 20px; color:black">Ngày</th>
            <th style="padding: 10px; font-size: 20px; color:black">Lời nhắn</th>
            <th style="padding: 10px; font-size: 20px; color:black">Trạng thái</th>
            <th style="padding: 10px; font-size: 20px; color:black">Hủy lịch hẹn</th>

        </tr>

        @foreach($appoint as $appoints)

        <tr style="background-color: rgb(233, 233, 233);" align="center">
            <td style="padding: 10px;  color:black">{{ $appoints->name }}</td>
            <td style="padding: 10px;  color:black">{{ $appoints->doctor }}</td>
            <td style="padding: 10px;  color:black">{{ $appoints->date }}</td>
            <td style="padding: 10px;  color:black">{{ $appoints->message }}</td>
            <td style="padding: 10px;  color:black">{{ $appoints->status }}</td>
            <td><a class="bt btn-danger" onclick="return confirm('Bạn chắc chắn xóa chưa?')" href="{{ url('cancel_appoint', $appoints->id) }}">Xóa</a></td>
        </tr>

        @endforeach


    </table>

  </div>


<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>