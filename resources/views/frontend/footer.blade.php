<footer>
    <div class="footer">
        <div class="container">
            <div class="row clearfix">
                <div class="col s3">
                    <h3>Study Abroad</h3>
                    <ul>
                        <li><a href="#">Australia</a></li>
                        <li><a href="#">Canada</a></li>
                        <li><a href="#">Estonia</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">New Zealand</a></li>
                        <li><a href="#">Singapore</a></li>
                        <li><a href="#">Thailand</a></li>
                        <li><a href="#">South Africa</a></li>
                        <li><a href="#">USA</a></li>
                    </ul>
                </div>
                <div class="col s3">
                    <h3>Education Consultants In</h3>
                    <ul>
                        <li><a href="#">Australia</a></li>
                        <li><a href="#">Canada</a></li>
                        <li><a href="#">Estonia</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">New Zealand</a></li>
                        <li><a href="#">Singapore</a></li>
                        <li><a href="#">Thailand</a></li>
                        <li><a href="#">South Africa</a></li>
                        <li><a href="#">USA</a></li>
                    </ul>
                </div>
                <div class="col s3">
                    <h3>Higher Education Institutions</h3>
                    <ul>
                        <li><a href="#">Australia</a></li>
                        <li><a href="#">Canada</a></li>
                        <li><a href="#">Estonia</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">New Zealand</a></li>
                        <li><a href="#">Singapore</a></li>
                        <li><a href="#">Thailand</a></li>
                        <li><a href="#">South Africa</a></li>
                        <li><a href="#">USA</a></li>
                    </ul>
                </div>
                <div class="col s3">
                    <h3>Students & Interns</h3>
                    <ul>
                        <li><a href="#">Australia</a></li>
                        <li><a href="#">Canada</a></li>
                        <li><a href="#">Estonia</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">New Zealand</a></li>
                        <li><a href="#">Singapore</a></li>
                        <li><a href="#">Thailand</a></li>
                        <li><a href="#">South Africa</a></li>
                        <li><a href="#">USA</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <ul class="clearfix">
                <li><a href="{{ url('pages/about') }}">About</a></li>
                <li><a href="{{ url('pages/contact') }}">Contact</a></li>
                <li><a href="{{ url('pages/faq') }}">FAQ</a></li>
                <li><a href="{{ url('pages/help-desk') }}">Help Desk</a></li>
                <li><a href="{{ url('pages/find-consultants') }}">Find Consultants</a></li>
                <li><a href="{{ url('pages/find-institutions') }}">Find Institutions</a></li>
                <li><a href="{{ url('pages/privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="{{ url('pages/terms-and-condition') }}">Terms and Condition</a></li>
                <li><a href="{{ url('pages/refund-policy') }}">Refund Policy</a></li>
                <li><a href="{{ url('pages/how-to-use') }}">How to use Abroad Mentor</a></li>
            </ul>
        </div>
    </div>
</footer>
</div>

<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('ul.tabs').tabs();
    $('.dropdown-button').dropdown('open');
    
    $('.testi-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        items: 1,
        autoplay: true
    });
    var owl1 = $('.testi-carousel');
    owl1.owlCarousel();
    $('.customNextBtn1').click(function () {
        owl1.trigger('next.owl.carousel');
    });
    $('.customPrevBtn1').click(function () {
        owl1.trigger('prev.owl.carousel', [300]);
    });

    $('.icon-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        items: 6,
        autoplay: false
    });
    var owl = $('.icon-carousel');
    owl.owlCarousel();
    $('.customNextBtn').click(function () {
        owl.trigger('next.owl.carousel');
    });
    $('.customPrevBtn').click(function () {
        owl.trigger('prev.owl.carousel', [300]);
    });

    $('.service-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        items: 3,
        autoplay: true
    });

    $('#customers-testimonials').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots: true,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });

});
</script>

@yield('footer')
@php
$errorList = $errors->all(); 
if(!empty($errorList)) {
echo toastr('error', $errorList); 
} else { 
echo toastr();
}
@endphp

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        Materialize.updateTextFields();
        $('.modal').modal();
        $(document).on("focus change blur", "input", function () {
            Materialize.updateTextFields();
        });
    });
</script>
</body>

</html>