        
        </div> <!--right_container end here-->
        
        <div class="side_banner_con">
            <div class="animated_img">
                    <img src="{{ asset('images/animated1.gif') }}" width="100%" />
            </div>
            <div class="animated_img">
                    <img src="{{ asset('images/animated2.gif') }}" width="100%" />
            </div>
	</div>
        
      
        <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
         
        
        
    </body>
</html>

@yield('footer')
@php
$errorList = $errors->all(); 
if(!empty($errorList)) {
echo toastr('error', $errorList); 
} else { 
echo toastr();
}
@endphp