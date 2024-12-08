@extends('layouts.website.index')
@section('contents')
@if(Session::has('success'))
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    text: '{{Session::get('success')}}',
    showConfirmButton: true,
    timer: '5000',
})
</script>
@endif
@if(Session::has('error'))
<script>
Swal.fire({
    position: 'center',
    icon: 'error',
    text: '{{Session::get('error')}}',
    showConfirmButton: true,
    timer: '5000',
})

</script>







@endif


    <!-- ========================
    
      
      Slider
    ============================== -->
    
    <section id="slider" class="slider slider-layout1 mt-10">
      <div class="carousel owl-carousel carousel-arrows carousel-dots carousel-dots-light" data-slide="1"
    
        data-slide-md="1" data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0"
      
        data-loop="true" data-speed="3000" data-transition="fade" data-animate-out="fadeOut" data-animate-in="fadeIn">
        <div class="slide-item align-v-h text-center bg-overlay">
          <div class="bg-img"><img src="{{asset('contents/website/assets')}}/images/backgrounds/16.jpg" alt="slide img"></div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
              
                <div class="slide__content">
                  <h2 class="slide__title">Offering The Best Tasting Experience!</h2>
                  <p class="slide__desc">Fresh Ingredient, Tasty Meals, And Creative Chefs</p>
                  <!-- <a href="menu-classic.html" class="btn btn__primary btn__hover2">view Menu</a> -->
                </div><!-- /.slide-content -->
    
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
    
        </div><!-- /.slide-item -->
    
        <div class="slide-item align-v-h text-center bg-overlay">
          <div class="bg-img"><img src="{{asset('contents/website/assets')}}/images/backgrounds/14.jpg" alt="slide img"></div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="slide__content">
    
                  <h2 class="slide__title">Offering The Best Tasting Experience!</h2>
    
                  <p class="slide__desc">Fresh Ingredient, Tasty Meals, And Creative Chefs</p>
                  <!-- <a href="menu-mixed.html" class="btn btn__primary mx-2">View Menu</a>
                  <a href="reservation.html" class="btn btn__white btn__bordered mx-2">Book A Table</a> -->
                </div><!-- /.slide-content -->
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.slide-item -->
    
      </div><!-- /.carousel -->
    
    </section><!-- /.slider -->

	
	



	
    <!-- =====================

      About
    ======================== -->
	

    <section class="about" id="about">
      
    
      <div class="container">
    
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading heading-layout1 text-center mb-20">
    
              <br><br><br><br><br>
              <span class="heading__subtitle">Welcome To The Food Recommendation and Order Management System</span>
    
              <h2 class="heading__title">Delicious Food, Friendly Staff, Cozy Atmosphere & Positive Emotions!</h2>
              <div class="heading__icon">
                
                <img src="{{asset('contents/website/assets')}}/images/shapes/shape2.png" alt="heading img">
      
              
              </div>      
            </div><!-- /.heading -->
          
          
          </div><!-- /.col-lg-6  -->
        
        </div><!-- /.row -->
        <div class="row align-items-center">
          
          <div class="col-sm-12 col-md-12 col-lg-4 text-center">
            
            
            <div class="mr-30" data-aos="fade-right">
              <img src="{{asset('contents/website/assets')}}/images/logo/logo.jpeg" alt="logo" class="mb-10">
          
              <p align="left"><b>Food Recommendation and Order Management System is about the food of China and Asia. We serve bright and fresh ingredients in our dishes to create the maximum amount of delicious pleasure we can for you.</b></p>              
        
        
              <!-- <img src="{{asset('contents/website/assets')}}/images/about/signature.png" alt="logo"> -->
            
            </div>
          </div><!-- /.col-lg-4 -->
          
        
          <div class="col-sm-12 col-md-12 col-lg-4">  
            <div class="reservation__banner" data-aos="fade-up">
            
              <img class="reservation__banner-img" src="{{asset('contents/website/assets')}}/images/backgrounds/pattern/3.jpg" alt="background">          
            
              <div class="reservation__banner-inner">    
                <span class="reservation__banner-inner-subtitle">Check Availability</span>
                <h5 class="reservation__banner-inner-title">Opening Times</h5>

                
                <ul class="list-unstyled">
              
                  <li><span>Week days</span><span>09.00 AM – 11:00 PM</span></li>
                  <li><span>Saturday</span><span>12:00 PM – 10.00 PM</span></li>
              
                  <li><span>Friday</span><span>Day off</span></li>
                </ul>
                <div class="reservation__banner-contact">
                  
                  <span class="reservation__banner-contact-label">Call Us Now</span>
                  
                  <a class="reservation__banner-contact-phone" href="tel:+880 0000000">+880 0000000</a>
                
                
                </div><!-- /.reservation__banner-contact -->
              
              </div><!-- /.reservation__banner-inner -->
            </div><!-- /.banner__img -->
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-12 col-lg-4">

          <div class="text-center-xs-sm-md ml-30" data-aos="fade-left">            
            

              <p class="mb-20"><b>Allow us to make your next special event extra special. We cater for all sized functions,
            
                ideal for your
                larger functions or an intimate gathering, our team can curate a menu to suit your taste.</b></p>
              <p class="mb-30"><b>Reservations are for lunch and dinner, check the availability of your table & book it
                now!</b></p>
              
              <!-- <a href="#" class="btn btn__primary">Reservation</a> -->
            </div>

          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About -->
	
	
	
	


    
    
    <!-- =========================== 
      features
    ============================= -->
    <section class="features">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="heading heading-layout1 text-center mb-50">
              
              <span class="heading__subtitle">Popular Dishes</span>
              <h2 class="heading__title">Delicious Food, Friendly Staff, Cozy Atmosphere & Positive Emotions!</h2>
              <div class="heading__icon">
                <img src="{{asset('contents/website/assets')}}/images/shapes/shape2.png" alt="heading img">
              </div>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <!-- feature item #1 -->
          <div class="col-sm-12 col-md-3 col-lg-3">
            
            <div class="feature-item">
              <div class="feature__img">
                <img src="{{asset('contents/website/assets')}}/images/features/1.jpg" alt="feature img">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <h4 class="feature__title">Italian</h4>
              </div><!-- /.feature__content-->
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-4 -->
          <!-- feature item #2 -->
          <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="{{asset('contents/website/assets')}}/images/features/3.jpg" alt="feature img">
              </div><!-- /.feature__img -->
              <div class="feature__content">
          
                <h4 class="feature__title">Japanese</h4>
              </div><!-- /.feature__content-->
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-4 -->
          <!-- feature item #3 -->
          <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="{{asset('contents/website/assets')}}/images/features/2.jpg" alt="feature img">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <h4 class="feature__title">Chinese</h4>
              </div><!-- /.feature__content-->
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-4 -->
          <!-- feature item #4 -->
          <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="{{asset('contents/website/assets')}}/images/features/1.jpg" alt="feature img">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <h4 class="feature__title">Indian</h4>
              </div><!-- /.feature__content-->
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-4 -->          
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 text-center">
            <p></p>
            
            <!-- <a class="btn btn__secondary btn__link" href="#">Discover Our Story</a> -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.features -->




    
@endsection