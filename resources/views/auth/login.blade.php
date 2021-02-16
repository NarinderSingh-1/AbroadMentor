@extends('frontend.layout')
@section('title', 'Login')
@section('content')

<!-- home service -->
<div class="container login_con">
    <div class="row">
        <div class="col s12 m12 l12">
            <ul class="tabs teal">
                <li class="tab col s6 l2"><a class="white-text active" href="#login">Sign In</a></li>
                <li class="tab col s6 l2"><a class="white-text" href="#register">Sign Up</a></li>
            </ul>
        </div>

        <div class="col s12 m12 l5 login_box">
            <div id="loginForm">
                <div class="white z-depth-2">
                    <div id="login" class="col s12">
                        <form action="/login" method="post">
                            {!! csrf_field() !!}
                            <div class="form-container">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" name="email">
                                        <label for="email">Email ID</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <!--p class="left" style="margin-top:0;">
                                            <input type="checkbox" id="test6" checked="checked">
                                            <label for="test6">Remember me for 30 days</label>
                                        </p-->
                                        <a href="/password/reset" class="right" style="font-size: 12px; font-weight: 400;">Forgotten password?</a>
                                    </div>

                                    <!--div class="col s12">
                                        <p>
                                            <input type="checkbox" id="test9">
                                            <label for="test9">Login with OTP instead of password</label>
                                        </p>
                                    </div-->

                                    <div class="col s12">
                                        <button class="btn waves-effect cus_btn" type="submit" name="action" style="width:100%; display:block; height:50px; font-size:14px; text-transform:capitalize; font-weight:300; margin-top:25px;">Login</button>

                                        <!--div class="hr-container">
                                            <hr class="hr-inline" align="left">
                                            <span class="hr-text"> or </span>
                                            <hr class="hr-inline" align="right">
                                        </div>

                                        <a href="#" class="btn connect-facebook-btn">
                                            <span class="facebookIcon">
                                                <img src="images/fb.svg" alt="">
                                            </span>
                                            Connect with Facebook
                                        </a-->
                                    </div>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>

                    <div id="register" class="col s12">
                        <form action="/register" method="post">
                            {!! csrf_field() !!}
                            <div class="form-container">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="first_name" type="text" class="validate" name="first_name">
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate" name="last_name">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" name="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password_confirmation" type="password" class="validate" name="password_confirmation">
                                        <label for="password_confirmation">Password Confirmation</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="phone-confirm" type="text" name="phone" class="validate">
                                        <label for="phone-confirm">Phone</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="register_type">
                                            <option value="" disabled selected>Register as</option>
                                            <option value="0">Institution</option>
                                            <option value="1">Student</option>
                                        </select>
                                        <label>&nbsp;</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <button class="btn waves-effect cus_btn" type="submit" name="action" style="width:100%; display:block; height:50px; font-size:14px; text-transform:capitalize; font-weight:300; margin-top:25px;">Submit</button>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col s12 m12 l7">
            <div class="form_text">
                <h5>All-in-one marketing platform to boost your teaching profession & it’s FREE!</h5>
                <p>What’s in it for you?</p>
            </div>

            <ul class="form_icons">
                <li>
                    <label><span>1</span></label>
                    <img src="images/form_ic1.png" />
                    <p>Register & Let Students Find You</p>
                </li>

                <li>
                    <label><span>2</span></label>
                    <img src="images/form_ic2.png" />
                    <p>Promote Courses & Get More Enrollments</p>
                </li>

                <li>
                    <label><span>3</span></label>
                    <img src="images/form_ic3.png" />
                    <p>Promote Educational Events & Get More Leads</p>
                </li>

                <li>
                    <label><span>4</span></label>
                    <img src="images/form_ic4.png" />
                    <p>Share & Advertise In a Click of Button</p>
                </li>

                <li>
                    <label><span>5</span></label>
                    <img src="images/form_ic5.png" />
                    <p>Receive Student Requirements in Your Inbox</p>
                </li>

                <li>
                    <label><span>6</span></label>
                    <img src="images/form_ic6.png" />
                    <p>Simply Boost Your Teaching Profession!</p>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- home service -->
@endsection
