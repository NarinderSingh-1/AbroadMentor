@extends('backend.layout')
@section('content')
            <div class="row">
                <div class="info_head">
                    <span><a href="{{url("promote/promote")}}"><i class="material-icons">arrow_back</i></a></span>
                    <span>
                        <h4>Promote your Profile</h4>
                        <p>Promote your profile to the world and get new Students</p>
                    </span>
                </div>
                <div class="col s12">
                    <form class="all_form">
                        <div class="badge_group">
                            <p class="form_txt" style="margin:15px 0 0 10px;">Select a Badge</p>
                            <ul class="bade_group">
                                <li><img src="{{ asset('images/promote1.png') }}" /></li>
                                <li><img src="{{ asset('images/promote2.png') }}" /></li>
                                <li><img src="{{ asset('images/promote3.png') }}" /></li>
                                <li><img src="{{ asset('images/promote4.png') }}" /></li>
                            </ul>
                        </div>


                        <div class="sel_badge">
                            <p class="form_txt" style="margin:15px 0 0 10px;">Badge</p>
                            <ul class="select_badge">
                                <li><img src="{{ asset('images/promote1.png') }}" /> <span class="badge_close"><i class="material-icons">close</i></span></li>
                            </ul>

                            <p class="form_txt" style="margin:15px 0 0 10px;">Select Size</p>

                            <ul class="badge_size">
                                <li>Extra large (336*132)</li>
                                <li>Large (300*117)</li>
                                <li>Medium (160*63)</li>
                                <li>Small (120*47)</li>
                            </ul>
                        </div>

                        
                    </form>
                </div>
            </div>
       @endsection