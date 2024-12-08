<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Food Recommendation and Order Management System">


    <link href="{{asset('contents/website/assets')}}/images/logo/logo.jpeg" rel="icon">
    <title>Food Recommendation and Order Management System</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Kristi%7cPoppins:400,500,600,700%7cYeseva+One&amp;display=swap">
    <link rel="stylesheet" href="{{asset('contents/website/assets')}}/css/libraries.css" />
    <link rel="stylesheet" href="{{asset('contents/website/assets')}}/css/style.css" />


    <!--js--> 
    <script src="{{asset('contents/website/assets')}}/js/jquery-3.4.1.min.js"></script>
    <script src="{{asset('contents/website/assets')}}/js/sweetalert2.all.min.js"></script> 


    
</head>




<body>


    <div class="wrapper">
        <!-- =========================
        Header
    =========================== -->
        <header class="header header-transparent header-layout1">

            <nav class="navbar navbar-expand-lg sticky-navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('contents/website/assets')}}/images/logo/logo.jpeg" class="logo-light"
                            alt="logo" height="80px" width="84px">
                        <!-- <img src="{{asset('contents/website/assets')}}/images/logo/logo-dark.png" class="logo-dark" alt="logo"> -->

                    </a>
                    <button class="navbar-toggler" type="button">
                        <span class="menu-lines"><span></span></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mainNavigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav__item"><a href="{{ url('/') }}" class="nav__item-link">Home</a></li>
                            <li class="nav__item"><a href="{{ url('/') }}#about" class="nav__item-link">About</a></li>
                            <li class="nav__item with-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Menu</a>
                                <ul class="dropdown-menu">
                                     @foreach (\App\Models\FoodCategory::all() as $catetory )
                                     <li class="nav__item dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">{{ $catetory->food_categories_name }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach (\App\Models\SubCategory::where('category_id',$catetory->food_categories_id)->get() as $subcategory )
                                            <li class="nav__item">
                                                <a href="{{ route('sub_category_food', ['slug' => $subcategory->sub_cat_slug]) }}" class="nav__item-link">{{ $subcategory->sub_cat_name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                     @endforeach
                                </ul>
                            </li>

                            <li class="nav__item"><a href="{{ route('review') }}" class="nav__item-link">Review</a></li>

                            <li class="nav__item"><a href="{{ route('login') }}" class="nav__item-link">Sign In</a></li>






                        </ul>
                    </div>

                </div><!-- /.container -->
            </nav><!-- /.navabr -->


        </header><!-- /.Header -->

        @yield('contents')



        <!-- ========================

      Footer


      ========================== -->
        <footer class="footer footer-layout1 text-center bg-dark">


            <div class="footer-top">

                <div class="container">
                    <div class="row align-items-center">

                        <div class=" col-sm-12 col-md-12 col-lg-4">
                            <div class="contact-box">
                                <h6 class="contact__box-title">Our Address</h6>
                                <ul class="contact__box-list list-unstyled">
                                    <li>XYZ <br> Dhaka, Bangladesh</li>

                                </ul>


                                <!-- <a href="contacts.html" class="btn btn__primary btn__hover2 btn__link">View On Map</a> -->
                            </div><!-- /.contact-box -->

                        </div><!-- /.col-lg-4 -->
                        <div class="col-sm-12 col-md-12 col-lg-4">

                            <img src="{{asset('contents/website/assets')}}/images/logo/logo.jpeg" alt="logo"
                                class="footer__logo mb-20" height="92px" width="126px">


                            <p class="mx-2 mb-20">EATING GOOD FOOD
                                WITH GOOD FRIENDS AND FAMILY.
                                WELCOME TO OUR Food Recommendation and Order Management System</p>

                            <ul class="social__icons social__icons-white justify-content-center">
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>

                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>


                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul><!-- /.social__icons -->

                        </div><!-- /.col-lg-4 -->
                        <div class="col-sm-12 col-md-12 col-lg-4">

                            <div class="contact-box">
                                <h6 class="contact__box-title">Private Dinning</h6>
    
                                <ul class="contact__box-list list-unstyled">
                                    <li><span>Main Email:</span> <a href="mailto:xyz@gmail.com">xyz@gmail.com</a></li>
                                    <li><span>Phone:</span> <a href="tel:+880 0000-0000">+880 0000-0000</a></li>
                                </ul>


                            </div><!-- /.contact-box -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->

                </div><!-- /.container -->

            </div><!-- /.footer-top -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">


                        <div class="col-sm-12 col-md-12 col-lg-12">


                            <nav class="footer__links">
                                <ul class="list-unstyled d-flex flex-wrap justify-content-center">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/') }}#about">About</a></li>
                                    <!-- <li><a href="#">Menu</a></li> -->



                                    <li><a href="{{ url('website/review') }}">Review</a></li>
                                    <li><a href="#">Sign In</a></li>

                                </ul>
                            </nav>

                            <div class="footer__copyright">
                                <span>&copy; </span>

                                <a href="#" class="color-theme">Food Recommendation and Order Management System</a>
                            </div>

                        </div>


                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.Footer-bottom -->


        </footer><!-- /.Footer -->

        <button id="scrollTopBtn"><i class="fa fa-angle-up"></i></button>


    </div><!-- /.wrapper -->

    <script src="{{asset('contents/website/assets')}}/js/jquery-3.3.1.min.js"></script>

    <script src="{{asset('contents/website/assets')}}/js/plugins.js"></script>

    <script src="{{asset('contents/website/assets')}}/js/main.js"></script>
    @yield('scripts')

</body>

</html>
<style>
.navbar .nav__item.dropdown-submenu>.dropdown-menu>.nav__item.with-dropdown>.dropdown-menu, .navbar .nav__item.with-dropdown>.dropdown-menu>.nav__item.dropdown-submenu>.dropdown-menu {
    top: 0px;
    left: -100%;
}
</style>









