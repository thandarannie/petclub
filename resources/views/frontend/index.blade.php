@extends('layout.frontmain')

@section('title','Pet Club')

@section('content')

    <div class="main">
        <div class="blast-box">
            <div class="blast-frame">
                <p>Color schemes</p>
                <div class="blast-colors d-flex justify-content-center">
                    <div class="blast-color">#00a8e0</div>
                    <div class="blast-color">#ff322e</div>
                    <div class="blast-color">#ff9900</div>
                    <div class="blast-color">#34bf49</div>
                    <div class="blast-color">#34bf49</div>

                    <!-- you can add more colors here -->
                </div>
                <p class="blast-custom-colors">Select Color</p>
                <input type="color" name="blastCustomColor" value="#cf2626">
            </div>
            <div class="blast-icon"><i class="fa fa-cog" aria-hidden="true"></i></div>

        </div>
        <div id="page">
            <div id="home" class="banner" data-blast="bgColor">

                <!--/banner-->
                 @include('layout.frontnav')
                <!-- Swiper Silder
                 ====================================== -->
                <!-- Slider main container -->
                <div class="swiper-container main-slider" id="myCarousel" data-blast="bgColor">
                    <div class="swiper-wrapper">
                    <?php 
                    $all_published_slider=DB::table('sliders')
                                               ->where('pub_status',1)
                                               ->get();
                      foreach ($all_published_slider as $v_slider) { ?>
                        <div class="swiper-slide slider-bg-position" style="background:url({{ asset('slider/'.$v_slider->image) }})" data-hash="slide1">
                            <div class="ban-info" data-blast="bgColor">
                                <h2>{{$v_slider->title}}</h2>
                                <p>{{$v_slider->sub_title}}</p>
                            </div>
                        </div>
                     <?php } ?>   
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-prev" ><i class="fa fa-chevron-left"></i></div>
                    <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Benefits
    ================================================== -->

    <section class="grids-bottom-w3ls bg-light py-md-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 about-in text-left">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-home" aria-hidden="true" data-blast="color"></i>
                            <h5 class="card-title">Pet Room</h5>
                            <div class="line" data-blast="bgColor"></div>
                            <p class="card-text mt-3">We can serve to clean your pet to have  better look.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 about-in text-left">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-cubes" aria-hidden="true" data-blast="color"></i>
                            <h5 class="card-title"> Best Food</h5>
                            <div class="line" data-blast="bgColor"></div>
                            <p class="card-text mt-3">We Feed healthy food and nutritious food to the pet.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 about-in text-left">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-heart-o" aria-hidden="true" data-blast="color"></i>
                            <h5 class="card-title"> Veterinarian Help</h5>
                            <div class="line" data-blast="bgColor"></div>
                            <p class="card-text mt-3">We have a clinic to care pet healthy.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 about-in text-left">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-calendar" aria-hidden="true" data-blast="color"></i>
                            <h5 class="card-title">Easy Booking</h5>
                            <div class="line" data-blast="bgColor"></div>
                            <p class="card-text mt-3">You can easy to book for your pet with good services.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Servives
    ================================================== -->
    <section class="banner-bottom-wthree py-md-5 py-3" id="services">
        <div class="container">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <h3 class="tittle text-center mb-lg-5 mb-3">
                    <span data-blast="color">Our</span>Services</h3>

              <?php  
                $services=DB::table('services')
                                           ->where('pub_status',1)
                                           ->get();
               ?>                            
                  @foreach ($services as $service) 
                @if($service->has_limit==1)
                <div class="row choose-main mb-lg-4">
                    <div class="col-lg-6 galsses-grid-right">
                        @if($service->has_limit==1) 
                                    <p data-blast="color">
                                        <h4 class="post mt-3">Limited Services</h4>
                                    </p>
                                    @else
                                     <p data-blast="color">
                                      <h4 class="post mt-3">UnLimited Services</h4>
                                    </p>
                       @endif
                        <h4><span data-blast="color">Price:</span>{{$service->cost_per_unit}}</h4>
                        <div class="line" data-blast="bgColor"></div>
                        <p class="mt-3">{{substr($service->notes,0,100)}} </p>
                         <div class="log-in mt-md-4 mt-3">
                            <a class="btn text-uppercase" data-blast="bgColor" href="#" data-toggle="modal" data-target="#service-{{$service->id}}" >
                             Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 galsses-grid-right">
                        <div class="galsses-grid-left">
                            <figure class="effect-lexi">
                                <img src="{{ asset('service/'.$service->image) }}" alt="" class="img-fluid">
                                <figcaption>
                                    <h3>
                                        <span data-blast="color">
                                            {{$service->service_name}}</span>
                                    </h3>
                                    @if($service->has_limit==1) 
                                    <p data-blast="color">
                                       Limited Service
                                    </p>
                                    @else
                                     <p data-blast="color">
                                       Unlimited Service
                                    </p>
                                    @endif
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                 @else
                 <div class="row choose-main my-lg-4 my-3">
                    <div class="col-lg-6 galsses-grid-right mt-lg-4">
                      <div class="galsses-grid-left">
                            <figure class="effect-lexi">
                                <img src="{{ asset('service/'.$service->image) }}" alt="" class="img-fluid">
                                <figcaption>
                                    <h3>
                                        <span data-blast="color">
                                            {{$service->service_name}}</span>
                                    </h3>
                                    @if($service->has_limit==1) 
                                    <p data-blast="color">
                                       Limited Service
                                    </p>
                                    @else
                                     <p data-blast="color">
                                       Unlimited Service
                                    </p>
                                    @endif
                                </figcaption>
                            </figure>
                        </div>
                     </div>
                     <div class="col-lg-6 galsses-grid-right mt-4">
                           @if($service->has_limit==1) 
                                    <p data-blast="color">
                                        <h4 class="post mt-3">Limited Services</h4>
                                    </p>
                                    @else
                                     <p data-blast="color">
                                      <h4 class="post mt-3">UnLimited Services</h4>
                                    </p>
                       @endif
                        <h4><span data-blast="color">Price:</span>{{$service->cost_per_unit}}</h4>
                        <div class="line" data-blast="bgColor"></div>
                        <p class="mt-3">{{substr($service->notes,0,100)}}  </p>
                         <div class="log-in mt-md-4 mt-3">
                            <a class="btn text-uppercase" data-blast="bgColor" href="#" data-toggle="modal" data-target="#service-{{$service->id}}">
                             Read More</a>
                        </div>
                      </div>  
                 </div>       
                 @endif
                 @endforeach
            </div>
        </div>
    </section>
   @include('layout.service_model')
    <!-- About 
    ================================================== -->
  <!-- <section class="about-sec parallax-section py-lg-5 py-4" id="about">
        <div class="container">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <div class="row choose-main">
                    <div class="col-lg-3">
                        <h3><small>Who We Are</small>About<br> Our Blog</h3>
                    </div>
                    <div class="col-lg-4">
                        <p>Lorem ipsum dolor sit amet Neque porro quisquam est qui dolorem Lorem int ipsum dolor sit amet when an unknown printer..</p>
                        <p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est eu accumsan cursus.</p>
                    </div>
                    <div class="col-lg-4">
                        <p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est eu accumsan cursus.</p>
                        <div class="log-in mt-md-4 mt-3">
                            <a class="btn text-uppercase" data-blast="bgColor" href="#">
                             Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     -->
    <!--Booking With Package 
    ================================================== -->
    <section class="banner-bottom-wthree py-lg-5 py-4" id="packagebook">
        <div class="container">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <h3 class="tittle text-center mb-lg-5 mb-3">
                    Package Booking
                    <span data-blast="color">for a day</span></h3>
                <div class="row blog">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <!-- Carousel items -->
                            <div class="carousel-inner">
                            <?php 
                                 $packages=DB::table('packages')->where('pub_status',1)->get();
                                 ?>
                            <div class="carousel-item active">
                               <div class="row">
                                  @foreach ($packages as $package)
                                        <div class="col-md-3 reviews-box">
                                            <div class="card text-center">
                                                  <div class="card-header">
                                                    {{$package->package_name}}
                                                  </div>
                                                  <div class="card-body">
                                                    <ul class="list-group">
                                                      <li class="list-group-item">{{$package->service_one}}</li>
                                                      <li class="list-group-item">{{$package->service_two}}</li>
                                                      <li class="list-group-item">{{$package->service_three}}</li>
                                                      <li class="list-group-item text-muted">Price::{{$package->prices}}</li>
                                                    </ul>
                                                  </div>
                                                  <div class="card-footer text-muted">
                                                   <a href="" data-toggle="modal" data-target="#{{$package->id}}" class="btn btn-primary">Book Now</a>
                                                  </div>
                                                </div>
                                        </div>
                                         
                                        @endforeach  
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
                            </div>
                            <!--.carousel-inner-->
                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>
        </div>
    </section>
 @include('layout.model')
    <!-- Booking Form
    ================================================== -->
    <section class="about-sec parallax-section py-lg-5 py-4" id="book">
        <div class="container-fluid">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <div class="choose-main">
                    <div id="search_form" class="search_top text-center">
                        <form  method="post" action="{{url('/save_booking')}}" class="booking-form row">
                            {{csrf_field()}}
                            <div class="col-md-2 banf">
                                <input class="form-control" type="text" name="name" placeholder="Name" required="">
                            </div>
                            <div class="col-md-3 banf">
                                <input class="form-control" type="text" name="email" placeholder="Email Address" required="">
                            </div>
                            <div class="col-md-2 banf">
                                <input class="form-control" type="text" name="phone_no" placeholder="Phone Number" required="">
                            </div>
                            <div class="col-md-3 banf">
                                <select id="country13" class="form-control" name="service_name">
                                     <?php 
                                         $services=DB::table('services')->where('pub_status',1)->get();
                                          foreach ($services as $service) { ?>
                                            <option value="{{$service->service_name}}">{{$service->service_name}}</option>
                                         <?php } ?>  
                                </select>
                            </div>
                            <div class="col-md-2 banf">
                                <input class="form-control" data-blast="bgColor" type="submit" value="Book Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery -->
     <?php  
        $services=DB::table('services')
                                   ->where('pub_status',1)
                                   ->get();
       ?>  
    <section class="banner-bottom-wthree py-md-5 py-3" id="gallery">
        <div class="container">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <h3 class="tittle text-center mb-lg-5 mb-3">
                    <span data-blast="color">Services</span> Photos</h3>
                <div class="row gallery_grid-more project-grids">
                    @foreach($services as $service)
                    <div class="col-md-3 p-0 pr-2 col-sm-3 col-6 personal_gallery_grid1 hover14 column">
                        <div class="personal_gallery_effect">
                            <a href="{{asset('service/'.$service->image)}}" data-lightbox="example-set" data-title="{{($service->service_name)}}">
                                <figure>
                                    <img src="{{asset('service/'.$service->image)}}" alt=" " class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials
    ================================================== -->
    <section class="banner-bottom-wthree py-lg-5 py-4" id="test">
        <div class="container">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <h3 class="tittle text-center mb-lg-5 mb-3">
                    <span data-blast="color">Customer Reviews </span>What Clients Say</h3>
                <div class="row blog">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <?php 
                                             $feedback=DB::table('feedback')->where('pub_status',1)->get();
                                      ?>
                                      <?php 
                                             $feed=DB::table('feedback')->where('pub_status',0)->get();
                                      ?>

                                   
                                    <div class="row">
                                         @foreach($feedback as $fb)
                                        <div class="col-md-3 reviews-box">
                                            <a href="#">
                                            <img src="{{asset('feedback/'.$fb->image)}}" alt="Image" style="max-width:100%;">
                                            </a>
                                            <p class="my-3 text-left"><i class="fa fa-quote-right" aria-hidden="true"></i> {{$fb->message}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <!--.row-->
                                </div>
                                <!--.item-->

                                <div class="carousel-item">
                                    <div class="row">
                                        @foreach($feed as $fb)
                                        <div class="col-md-3 reviews-box">
                                            <a href="#">
                                            <img src="{{asset('feedback/'.$fb->image)}}" alt="Image" style="max-width:100%;">
                                            </a>
                                            <p class="my-3 text-left"><i class="fa fa-quote-right" aria-hidden="true"></i> {{$fb->message}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                            </div>
                            <!--.carousel-inner-->
                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact
    ================================================== -->
    <section class="about-sec contact-sec parallax-section py-lg-5 py-4" id="contact">
        <div class="container">
            <div class="inner-sec-w3layouts py-md-5 py-3">
                <div class="choose-main row">
                    <div class="col-md-4">
                        <h3><small>Find Us</small> Contact Us</h3>
                            <div class="map mt-3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27404345275!2d-118.69191921441556!3d34.02016130939095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos+Angeles%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522474296007" allowfullscreen=""></iframe>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-contact">
                            <form action="{{url('/user_feedback')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="my-2">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" id="textarea" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image">
                                </div>
                                <div class="input-group1">
                                    <input class="form-control" data-blast="bgColor" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@include('layout.frontfooter')
@endsection