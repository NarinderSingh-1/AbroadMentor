@extends('backend.layout')
@section('content')
            <div class="row">
                <div class="info_head">
                    <span>
                        <h4>Promote</h4>
                        <p>manage Information related to all of your branches here.</p>
                    </span>
                </div>
                <div class="col s12">
                    <div class="row padtp40">

                        <div class="col s12">
                            <ul class="tab">
                                <li class="tab"><a class="active" href="{{url('/promote')}}">Upgrade</a></li>
                                <li class="tab"><a  href="{{url('/promote/advertisement')}}">Advertise</a></li>
                                <li class="tab"><a href="{{url('/promote/promote')}}">Promote</a></li>
                            </ul>
                        </div>

                        <!-- Upgrade -->
                        <form class="col s12 all_form" id="upgrade">
                            <div class="row">
                                <div class="col s12">
                                    <div class="plan_con">
                                        <div class="gold">
                                            <div class="head">Gold</div>
                                            <ul class="plan_list">
                                                <li>Faster Enquiry by Mobile SMS & Emails</li>
                                                <li>Auto response for all Enquiries</li>
                                                <li>Sugested to Students Highly Usibility</li>
                                            </ul>

                                            <div class="plan_check">
                                                <input type="checkbox" class="filled-in"  checked="checked" id="test5" />
                                                <label for="test5">Select</label>
                                            </div>

                                        </div>

                                        <div class="platinum">
                                            <div class="head">Platinum</div>
                                            <ul class="plan_list">
                                                <li>Faster Enquiry alerts via SMS & Emails</li>
                                                <li>Auto response for all Enquiries</li>
                                                <li>Get Direct Calls & Messages from Students#</li>
                                                <li>Get Higher Pro Score</li>
                                                <li>Suggested to Students</li>
                                                <li>15 minutes advance alerts*</li>
                                                <li>Get all matching Enquiries for 10 category locality combinations</li>
                                                <li>Get Priority Listing for 10 category locality combinations</li>
                                                <li>Choice to display phone number on Profile page</li>
                                                <li>Get recommended on similar profiles</li>
                                            </ul>

                                            <div class="plan_check">
                                                <input type="checkbox" class="filled-in" id="test6" />
                                                <label for="test6">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Upgrade -->


                    </div>
                </div>
            </div>
        @endsection