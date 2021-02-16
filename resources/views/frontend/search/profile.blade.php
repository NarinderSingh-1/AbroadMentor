@extends('frontend.search.layout')
@section('title', $org->name)
@section('content')

<script type="text/javascript">var salt = '{{ csrf_token() }}';</script>
<script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
<script type="text/javascript">getProfileData({{$org->id}}, 'overview');</script>
<!-- Listing -->
<div class="listing">
    <div class="container">
        <div class="row clearfix">
            <div class="col s12 m12 l12">
                <div class="detail_con">
                    <div class="list_con">
                        <div class="list_div">
                            <div class="list_container list-detail">
                                <div class="list_left">
                                    <div class="img_con">
                                        <img src="{{ asset('images/Consultants.jpg') }}" />
                                    </div>
                                </div>
                                
                                <div class="list_info">
                                    <div class="info_top">
                                        <h2>{{ $org->name . ' (' . $org->started_year . ')' }}</h2>                                        
                                        <div class="list_detail">
                                            <p style="margin:10px 0 5px 0;">{{ $org->address . ', ' . ucfirst($org->city->name) }}</p>
                                            <a>Get Directions</a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <section class='rating-widget'>

                                    <!-- Rating Stars Box -->
                                    <div class='rating-stars text-center'>
                                    <ul id='stars'>
                                        <li class='star' title='Poor' data-value='1'>
                                        <i class="fa material-icons">star</i>
                                        </li>
                                        <li class='star' title='Fair' data-value='2'>
                                        <i class="fa material-icons">star</i>
                                        </li>
                                        <li class='star' title='Good' data-value='3'>
                                        <i class="fa material-icons">star</i>
                                        </li>
                                        <li class='star' title='Excellent' data-value='4'>
                                        <i class="fa material-icons">star</i>
                                        </li>
                                        <li class='star' title='WOW!!!' data-value='5'>
                                        <i class="fa material-icons">star</i>
                                        </li>
                                    </ul>
                                    
                                    <a class="waves-effect waves-light modal-trigger" href="#modal1" style="margin-top:-10px;"><img src="{{ asset('images/like_pop.png') }}" class="like_btn" /></a>
                                    </div>
                                </section>
                                
                                
                            </div>
                        </div>
                        
                        <div class="col s12 ">
                            <a class="btn book_btn">Contact Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- tabination -->
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab"><a class="active" href="#overview" onclick="getProfileData({{$org->id}}, 'overview')">Overview</a></li>
                            <li class="tab"><a href="#mentor" onclick="getProfileData({{$org->id}}, 'mentor')">Mentors</a></li>
                            <li class="tab"><a href="#service" onclick="getProfileData({{$org->id}}, 'service')">Services</a></li>
                            <li class="tab"><a href="#achievement" onclick="getProfileData({{$org->id}}, 'achievement')">Achievement</a></li>
                            <li class="tab"><a href="#membership" onclick="getProfileData({{$org->id}}, 'membership')">Membership</a></li>
                            <li class="tab"><a href="#events" onclick="getProfileData({{$org->id}}, 'events')">Events</a></li>
                            <li class="tab"><a href="#testimonials" onclick="getProfileData({{$org->id}}, 'testimonials')">Testimonials</a></li>
                            <li class="tab"><a href="#article" onclick="getProfileData({{$org->id}}, 'article')">Article</a></li>
                        </ul>
                    </div>
                    
                    <div class="col s12">
                        <!-- overview -->
                        <div id="overview">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <p class="head">About Us</p>
                                    <div class="head_all_txt">
                                        <p>{{ $org->about_us }}</p>
                                    </div>
                                    
                                    <div class="service_list_con">
                                        <p class="all_head">Services</p>
                                        <span><strong>Major:</strong></span>
                                        <div class="mar_ser xhrOverviewMajorService"></div>
                                        
                                        <span><strong>Other:</strong></span>
                                        <div class="mar_ser xhrOverviewOtherService"></div>
                                        
                                        <div class="gallerypic gallery-image xhrOverviewGallery"></div>
                                        
                                        <p class="all_head">Branches</p>
                                        <ul class="service_list xhrOverviewBranch">
                                            <!-- <li class="view-more"><a>View more</a></li> -->
                                        </ul>
                                    </div>
                                    
                                    <div class="list_container_info">
                                        <p class="all_head">Timings</p>
                                        <div class="time_con">
                                            <span><img src="{{ asset('images/clock.png') }}" /></span>
                                            <span>
                                                <span class="time">MON-SAT</span>
                                                <p>8:AM-8:PM</p>
                                            </span>
                                        </div>
                                        
                                        <p class="all_head">Upcoming events</p>
                                        <div class="overview-event xhrOverviewEvent"></div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <!--p class="all_head">Certified From</p>
                                    <ul class="certified_img gallery-image">
                                        <li><a href="{{ asset('images/iccrc_logo.png') }}"><img src="{{ asset('images/iccrc_logo.png') }}" /></a></li>
                                        <li><a href="{{ asset('images/idp_logo.png') }}"><img src="{{ asset('images/idp_logo.png') }}" /></a></li>
                                        <li><a href="{{ asset('images/bc_logo.jpg') }}"><img src="{{ asset('images/bc_logo.jpg') }}" /></a></li>
                                        <li><a href="{{ asset('images/logo1.png') }}"><img src="{{ asset('images/logo1.png') }}" /></a></li>
                                        <li><a href="{{ asset('images/logo1.png') }}"><img src="{{ asset('images/logo1.png') }}" /></a></li>
                                        <li class="view-more"><a>View more</a></li>	
                                    </ul-->
                                </div>
                            </div>	
                        </div>
                        <!-- overview -->

                        <!-- Mentros -->
                        <div id="mentor">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <p class="head">Our Mentors</p>
                                    <div class="xhrMentorList"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Mentros -->
                        
                        <!-- Services -->
                        <div id="service">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <p class="mar_head" style="color:#171f2d !important; margin-bottom:5px;">Major Deal In</p>
                                    <ul class="main_service xhrServiceMajor"></ul>
                                    
                                    <p class="mar_head" style="color:#171f2d !important; margin-bottom:5px;">Other Deal In</p>
                                    <ul class="main_service xhrServiceOther"></ul>
                                    
                                    <p class="mar_head" style="color:#171f2d !important; margin-bottom:5px;">Countries Deal In</p>
                                    <ul class="service_list xhrServiceCountries"></ul>
                                    
                                    <p class="mar_head" style="color:#171f2d !important; margin-bottom:5px;">University|College Deal In</p>
                                    <ul class="main_service xhrServiceUniversities"></ul>
                                </div>
                            </div>
                        </div>
                        <!--Services -->
                        
                        <!-- Achivement -->
                        <div id="achievement">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <div class="list_div xhrAchievments"></div>
                                </div>
                            </div>
                        </div>	
                        <!-- Achivement -->
                        
                        <!-- Membership -->
                        <div id="membership">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}" />
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="list_con memlist">
                                        <div class="list_div">
                                            <div class="list_container">
                                                <div class="list_left">
                                                    <div class="img_con">
                                                        <img src="{{ asset('images/Consultants.jpg') }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="list_info">
                                                    <div class="info_top">
                                                        <div class="list_detail">
                                                            <p><strong>LIC No. / Registration</strong> <span>123456789</span></p>
                                                            <p><strong>Membership Name</strong> <span>Mara Agent</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Membership -->
                                              
                        <!-- Event -->
                        <div id="events">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <ul class="event_tab xhrEventList"></ul>
                                </div>
                            </div>	
                        </div>
                        <!-- Event -->
                        
                        <!-- Testimonials -->
                        <div id="testimonials">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <div class="col s12 m12 l12 slider_con">
                                        <div class="testimonials">
                                            <div class="owl-carousel testi-carousel list_slider xhrTestimonials" id="listslider7">                            
                                                <div class="item">
                                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/IsAVGCIQ0Q8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            
                                            <div class="controllers">
                                                <a href="javascript:void(0)" class="customPrevBtn7 prev"><img src="{{ asset('images/sliderprev.png') }}" /></a>
                                                <a href="javascript:void(0)" class="customNextBtn7 next"><img src="{{ asset('images/slidernext.png') }}" /></a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonials -->
                        
                        <!-- Article -->
                        <div id="article">
                            <div class="detail_tab">
                                {!! getPreloader() !!}
                                <div class="preloader-content">
                                    <div class="testimonials">
                                        <div class="owl-carousel testi-carousel list_slider article1" id="listslider8">                            
                                            <div class="item">
                                                <figure><img src="{{ asset('images/Institutions.jpg') }}" /></figure>
                                                <div>
                                                    <p>Florists</p>
                                                    <span><img src="{{ asset('images/avatar.png') }}" class="user" /></span> <span>1119 verified partners</span>
                                                    <strong>Stunning Flowers From An Indian Wedding</strong>
                                                    <p class="all_txt">Flowers are an important part of an Indian wedding. They are used everywhere from stage decoration to the important ‘varamala’ ceremony where the couple exchange garlands. While...</p>
                                                    <a class="article_btn">Get quotes</a>
                                                </div>
                                            </div>
                                            
                                            <div class="item">
                                                <figure><img src="{{ asset('images/banner1.jpg') }}" /></figure>
                                                <div>
                                                    <p>Catering Services</p>
                                                    <span><img src="{{ asset('images/avatar.png') }}" class="user" /></span> <span>1119 verified partners</span>
                                                    <strong>Stunning Flowers From An Indian Wedding</strong>
                                                    <p class="all_txt">Once your wedding dates are fixed, the most important aspect to be planned is the food. Depending on your preference, you choose from either vegetarian or non-vegetarian option. Normally there is..</p>
                                                    <a class="article_btn">Get quotes</a>
                                                </div>
                                            </div>
                                            
                                            <div class="item">
                                                <figure><img src="{{ asset('images/Consultants.jpg') }}" /></figure>
                                                <div>
                                                    <p>Event Organisers</p>
                                                    <span><img src="images/avatar.png') }}" class="user" /></span> <span>1119 verified partners</span>
                                                    <strong>6 Things To Keep In Mind For Your Outdoor Wedding</strong>
                                                    <p class="all_txt">Outdoor weddings can be extravagant and breathtaking, but making arrangements can be a daunting task as compared to indoor weddings. However, with the right guidance from a reputed matrimonial service or a wedding planner,..</p>
                                                    <a class="article_btn">Get quotes</a>
                                                </div>
                                            </div>
                                            
                                            <div class="item">
                                                <figure><img src="{{ asset('images/banner1.jpg') }}" /></figure>
                                                <div>
                                                    <p>Catering Services</p>
                                                    <span><img src="{{ asset('images/avatar.png') }}" class="user" /></span> <span>1119 verified partners</span>
                                                    <strong>Brief Guide On Planning The Menu For Your Wedding</strong>
                                                    <p class="all_txt">Weddings these days are becoming more and more elaborate. It is one of the biggest grandeurs of one’s life, standing just behind a wedding party. From the engagement to the reception, all the functions are being celebrated in style; and from the s...</p>
                                                    <a class="article_btn">Get quotes</a>
                                                </div>
                                            </div>
                                            
                                            <div class="item">
                                                <figure><img src="{{ asset('images/Institutions.jpg') }}" /></figure>
                                                <div>
                                                    <p>Web Designers</p>
                                                    <span>1119 verified partners</span>
                                                    <a>Get quotes</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="controllers">
                                            <a href="javascript:void(0)" class="customPrevBtn8 prev"><img src="{{ asset('images/sliderprev.png') }}" /></a>
                                            <a href="javascript:void(0)" class="customNextBtn8 next"><img src="{{ asset('images/slidernext.png') }}" /></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <!-- Article --> 
                    </div>
                </div><!-- tabination -->
            </div>	
               
            {{-- <div class="col s2 sidebar">
                <h3>Most Searched Localities In Delhi</h3>
                <ul>
                    <li><a href="#">Dermatologist in Dwarka</a></li>
                    <li><a href="#">Dermatologist in Pitampura</a></li>
                    <li><a href="#">Dermatologist in Greater Kailash Part 1</a></li>
                    <li><a href="#">Dermatologist in Rohini</a></li>
                    <li><a href="#">Dermatologist in Vasant Kunj</a></li>
                </ul>
                
                <h3>Health Articles</h3>
                <ul>
                    <li><a href="#">Acne</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('footer')
<style type="text/css">
    .loc .caret{right:15px !important; top:3px !important;}
</style>
@endsection
