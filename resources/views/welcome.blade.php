<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DOLE - RO8 | Document Tracking System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets2/img/favicon.png" rel="icon">
  <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="#">DOLE | RO8</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background-image: url('auth-bg.jpg');">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Document Tracking System</h1>
          <h2>Let's track your document using tracking numbers!</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('dts') }}" class="btn-get-started scrollto" target="_blank">Get Started</a>
            {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets2/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

   

    <div class="container footer-bottom clearfix">
      
      <div class="credits">
        Crafted by DOLE - RO8 | ICT Unit
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets2/vendor/aos/aos.js"></script>
  <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets2/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets2/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>

</body>
<script>
  const scanner = new Html5QrcodeScanner('reader', {
      // Scanner will be initialized in DOM inside element with id of 'reader'
      qrbox: {
          width: 250,
          height: 250,
      },  // Sets dimensions of scanning box (set relative to reader element width)
      fps: 20, // Frames per second to attempt a scan
  });


  scanner.render(success, error);
  // Starts scanner

  function success(result) {
      document.getElementById('result').innerHTML = `
      <h2>Success!</h2>
      <input name="query" type="text" value="${result}" hidden>
      `;
      // responsiveVoice.enableWindowClickHook();
      
      simulateClick();
      

      // <p><p value="${result}">${result}</p></p>
     
      // Prints result as a link inside result element
      // alert('Sucess!');
      // function tempAlert(msg,duration)
      // {
      // var el = document.createElement("div");
      // el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");
      // el.innerHTML = msg;
      // setTimeout(function(){
      // el.parentNode.removeChild(el);
      // },duration);
      // document.body.appendChild(el);
      // }
      // console.log('Success');
      // tempAlert("close",1000);
      
      
      scanner.clear();
      // Clears scanning instance

       // Call the function to trigger the click event automatically
      
      document.getElementById('reader').remove();
      // Removes reader element from DOM since no longer needed

  }

  function error(err) {
      // console.error(err);
      // Prints any errors to the console
  }

  // Get the element that you want to click
  const myElement = document.getElementById('my-button');

  // Define a function to simulate a click event
  function simulateClick() {
  const event = new MouseEvent('click', {
      view: window,
      bubbles: true,
      cancelable: true
  });
  myElement.dispatchEvent(event);
  }

</script>
</html>
