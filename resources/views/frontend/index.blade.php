@extends('frontend.layout')
@section('title', 'Home')
@section('content')

<!-- home banner -->
<div class="banner_con"  style="background-image:url('images/banner1.jpg')">
    <div class="container" style="display:table; height:100%;">
        <div class="home_search">
            <div class="col s12">
                <h1>We are Provide Consultants, Institutions & Courses</h1>
                <h3>Find and Book</h3>	
            </div>
            <form class="loc_search" action="/search" method="get">
                <div class="input-field loc">
                    <input type="text" name="place" class="location" id="locationAutoComplete" placeholder="Place" value="" autocomplete="off" />
                </div>
                <div class="input-field search">
                    <input type="text" name="service" class="services" id="serviceAutoComplete" placeholder="Search" value="" autocomplete="off" />
                </div>
                <button class="btn search-btn waves-effect waves-light" type="submit" name="q" value="1">
                    <img src="{{ asset('images/search-white.png') }}" alt="search" />
                </button>
            </form>
        </div>    	                      
    </div>
</div>
<!-- home banner -->

<!-- home slider -->
<div class="bannerBar">
    <div class="container">
        <div class="owl-carousel banner_slider">
            <div>
            <a href="{{ url('pages/global-marketing-gap') }}">
                    <span class="icon"><img src="/images/marketing.png" alt="" /></span>
                    <p>Bridge the Global Marketing Gap</p>
                </a>
            </div>
            <div>
                <a href="{{ url('pages/marketing-control') }}">
                    <span class="icon"><img src="/images/chart.png" alt="" /></span>
                    <p>Control your Marketing</p>
                </a>
            </div>
            <div>
                <a href="{{ url('pages/reporting-mechanism') }}">
                    <span class="icon"><img src="/images/report.png" alt="" /></span>
                    <p>Reporting Mechanism</p>
                </a>
            </div>
            <div>
                <a href="{{ url('pages/achieve-guaranteed-international-targets') }}">
                    <span class="icon"><img src="/images/target.png" alt="" /></span>
                    <p>Achieve Guaranteed International Targets</p>
                </a>
            </div>
            <div>
                <a href="{{ url('pages/application-and-management-ecosystem') }}">
                    <span class="icon"><img src="/images/managment.png" alt="" /></span>
                    <p>Application and Management Ecosystem</p>
                </a>
            </div>
            <div>
                <a href="{{ url('pages/global-agent-and-student-network') }}">
                    <span class="icon"><img src="/images/student_net.png" alt="" /></span>
                    <p>Global Agent and Student Network</p>
                </a>
            </div>
        </div>
        <div class="controllers">
            <a href="javascript:void(0)" class="customPrevBtn prev"><img src="/images/prev.png" /></a>
            <a href="javascript:void(0)" class="customNextBtn next"><img src="/images/next.png" /></a>
        </div>
    </div>
</div>
<!-- home banner -->	  

<!-- home service -->
<div class="section-1">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 push-m6 l5 push-l7 video">
                <div class="owl-carousel owl-theme institute-slider">
                    <div class="item"><img src="/images/Institutions.jpg" /></div>
                    <div class="item"><img src="/images/banner1.jpg" /></div>
                    <div class="item"><img src="/images/Consultants.jpg" /></div>
                </div>
            </div>

            <div class="col s12 m6 pull-m6 l7 pull-l5">
                <h2>Institute</h2>
                <p>Enhance your marketing efforts with more customized, relevant information. UniAgents provides immersive customizable support to make the international recruitment process as easy as can be.</p>
                <a class="waves-effect cus_btn btn">Learn More</a>


                <div class="testimonials">
                    <div class="owl-carousel testi-carousel" id="test_slider1">
                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjani Sirivella</span>
                        </div>

                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjaniii Sirivella</span>
                        </div>

                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjaniii Sirivella</span>
                        </div>

                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjaniii Sirivella</span>
                        </div>

                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjaniii Sirivella</span>
                        </div>
                    </div>

                    <div class="controllers">
                        <a href="javascript:void(0)" class="customPrevBtn1 prev"><i class="material-icons">chevron_left</i></a>
                        <a href="javascript:void(0)" class="customNextBtn1 next"><i class="material-icons">chevron_right</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-1 grey">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l7 push-l5">
                <h2>Students</h2>
                <p>As a student, do you think it would be beneficial if someone can send you all important information about International summer internships, placement options, higher study options abroad and guide you with scholarships too?</p>
                <a class="waves-effect cus_btn btn">Learn More</a>

                <div class="testimonials">
                    <div class="owl-carousel testi-carousel" id="test_slider2">
                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjani Sirivella</span>
                        </div>
                        <div class="testimonial">
                            <div class="ratings"><i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i> <i class="material-icons">star</i></div>
                            <p>Very easy to use, user interface is amazing. The option Where I can book a cab truly showed how much this app-makers cares about the patient's health</p>
                            <span class="author"><i class="material-icons">person</i> Anjaniii Sirivella</span>
                        </div>
                    </div>

                    <div class="controllers">
                        <a href="javascript:void(0)" class="customPrevBtn2 prev"><i class="material-icons">chevron_left</i></a>
                        <a href="javascript:void(0)" class="customNextBtn2 next"><i class="material-icons">chevron_right</i></a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l5 pull-l7">
                <div class="owl-carousel owl-theme student-slider">
                    <div class="item"><img src="/images/Students.png" /></div>
                    <div class="item"><img src="/images/banner1.jpg" /></div>
                    <div class="item"><img src="/images/Consultants.jpg" /></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- home service -->

<!-- Hot it work -->
<div class="section-1">
    <div class="container">
        <div class="row">
            <h3 class="center-align">How it works for Students & Mentor</h3>
            <div class="col s12 m12 l4">
                <div class="tab_con center-align">
                    <img src="/images/Create_Free_Profile.png" />
                    <p class="tab_head">Create Free Profile</p>
                    <p>Upload Photos, Portfolio,<br />Certificates, Add Description, Qualification,<br /> Achievements to Help students Discover You</p>
                </div>
            </div>

            <div class="col s12 m12 l4">
                <div class="tab_con center-align">
                    <img src="/images/Connect_with_Customers.png" />
                    <p class="tab_head">Connect with Students</p>
                    <p>Respond to Enquiries or Search<br />Prospective Students in<br />Your Location</p>
                </div>
            </div>

            <div class="col s12 m12 l4">
                <div class="tab_con center-align">
                    <img src="/images/Grow_Your_Credentials.png" />
                    <p class="tab_head">Grow Your business</p>
                    <p>Collect Reviews,<br />Enrich your Profile & <br />Reach out to more Students</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hot it work -->

<!-- Client testimonials -->
<section class="testimonialsBox section-1 grey">
    <div class="container">
        <h3>What Tutors & Trains say about UrbanPro</h3>

        <div class="row">
            <div class="col s12 m12 l6">
                <div class="pro_section">
                    <p class="pro_head">Reach out to more Students</p>
                    <p>Join 6,50,000+ Tutors and Trainers on UrbanPro and get enquiries!</p>
                    <a class="pro_btn" href="{{ url('/login#register') }}">Create your profile now</a>
                </div>
            </div>

            <div class="col s12 m12 l6">
                <div class="client_con">
                    <div id="customers-testimonials" class="owl-carousel client_msg">
                        <div class="item">
                            <a href="#">
                                <div class="shadow-effect">
                                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate. <span>Read More...</span></p>
                                </div>
                                <div class="testimonial-name">EMILIANO AQUILANI</div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <div class="shadow-effect">
                                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate. <span>Read More...</span></p>
                                </div>
                                <div class="testimonial-name">ANNA ITURBE</div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <div class="shadow-effect">
                                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate. <span>Read More...</span></p>
                                </div>
                                <div class="testimonial-name">LARA ATKINSON</div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <div class="shadow-effect">
                                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate. <span>Read More...</span></p>
                                </div>
                                <div class="testimonial-name">IAN OWEN</div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <div class="shadow-effect">
                                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate. <span>Read More...</span></p>
                                </div>
                                <div class="testimonial-name">MICHAEL TEDDY</div>
                            </a>
                        </div>
                    </div>

                    <div class="client_control">
                        <a href="javascript:void(0)" class="customprevbtn prev"><i class="material-icons">chevron_left</i></a>
                        <a href="javascript:void(0)" class="customnextbtn next"><i class="material-icons">chevron_right</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Client testimonials -->

@endsection

@section('footer')
{!! getSearchData() !!}
@endsection