<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style-starter.css')}}">
  <!-- Template CSS -->
</head>

<body>

<!-- header starts here -->
  @include('playouts.header')
<!-- header ends here -->


<!-- content starts here -->
@yield('content')

<!-- contenet ends here -->

<!-- footer starts here -->
@include('playouts.footer')
<!-- footer ends here -->







<!-- Template JavaScript -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/theme-change.js')}}"></script>
<!--/slider-js-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.zoomslider.min.js')}}"></script>
<!--//slider-js-->
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<!-- script for tesimonials carousel slider -->
<script>
  $(document).ready(function () {
    $("#owl-demo1").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        736: {
          items: 1,
          nav: false
        },
        1000: {
          items: 1,
          nav: false,
          loop: true
        }
      }
    })
  })
</script>
<!-- //script for tesimonials carousel slider -->
<!-- stats number counter-->
<script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countup.js')}}"></script>

<script>
  $('.counter').countUp();
</script>
<!-- //stats number counter -->

<!--/MENU-JS-->
<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>
<!--//MENU-JS-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
{{-- js for form modal --}}
<script>
@if ($errors->count() > 0)
    $('#LoginModal').modal('show');
    @endif
</script>


</body>

</html>
