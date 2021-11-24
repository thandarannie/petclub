
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Pet Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
        <script>
          $('#blogCarousel').carousel({
            interval: 5000
        });
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css" media="all" />
    <link href="{{asset('frontend/css/blast.min.css')}}" rel="stylesheet" />

    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!--lightbox -->
    <link rel="stylesheet" href="{{asset('frontend/css/lightbox.css')}}">
    <!-- lightbox -->


    <!-- Font-Awesome-Icons-CSS -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

@yield('content')


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!--//banner-->
    <!--//footer-->
    <script src="{{asset('frontend/js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('frontend/js/boost.js')}}"></script>
    <script src="{{asset('frontend/js/blast.min.js')}}"></script>
    <!--  light box js -->
    <script src="{{asset('frontend/js/lightbox-plus-jquery.min.js')}}">
    </script>

    <!-- //light box js-->

    <!--/ start-smoth-scrolling -->
    <script src="{{asset('frontend/js/move-top.js')}}"></script>
    <script src="{{asset('frontend/js/easing.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
                                    var defaults = {
                                          containerID: 'toTop', // fading element id
                                        containerHoverID: 'toTopHover', // fading element hover id
                                        scrollSpeed: 1200,
                                        easingType: 'linear' 
                                     };
                                    */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

    <!-- //js -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if($errors->any())
   @foreach($errors->all() as $error)
     <script>
       toastr.error('{{$error}}');
     </script> 
   @endforeach
@endif

    <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
</body>