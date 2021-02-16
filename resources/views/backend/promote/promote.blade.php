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
                                <li class="tab"><a  href="{{url('/promote')}}">Upgrade</a></li>
                                <li class="tab"><a  href="{{url('/promote/advertisement')}}">Advertise</a></li>
                                <li class="tab"><a class="active" href="{{url('/promote/promote')}}">Promote</a></li>
                            </ul>
                        </div>


                        <!-- Promote -->
                        <form class="col s12 all_form" id="promote">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <ul class="info-tab">
                                            <li>
                                                <a href="{{ url('promote/badge')}}">
                                                    <span>
                                                        <h4>Build trust by adding Badge on your website or blog</h4>
                                                    </span>
                                                    <i class="material-icons">chevron_right</i>
                                                </a>
                                            </li>

                                            <li>
                                                <a>
                                                    <span>
                                                        <h4>Increase hiring chance by sharing your Profile via SMS</h4>
                                                    </span>
                                                    <i class="material-icons">chevron_right</i>
                                                </a>
                                            </li>

                                            <li>
                                                <a>
                                                    <span>
                                                        <h4>Get more Students by posting your profile on OLX or Quikr</h4>
                                                    </span>
                                                    <i class="material-icons">chevron_right</i>
                                                </a>
                                            </li>

                                            <li>
                                                <a>
                                                    <span>
                                                        <h4>Get Badge for your Pamphlets</h4>
                                                    </span>
                                                    <i class="material-icons">chevron_right</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Promote -->

                    </div>
                </div>
            </div>
        @endsection