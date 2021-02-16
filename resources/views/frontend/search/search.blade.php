@extends('frontend.search.layout')
@section('title', 'Search results')
@section('content')

<!-- Filter -->
<div class="filters" id="filter">
    <div class="container">
        <span class="white-text">Search results</span>
        {{--<ul>
            <li>
                <div>
                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                    <label for="filled-in-box">Filled in</label>
                </div>
            </li>
            <li>
                <div>
                    <input type="checkbox" class="filled-in" id="filled-in-box1" />
                    <label for="filled-in-box1">Filled in</label>
                </div>
            </li>
            <li>
                <div>
                    <input type="checkbox" class="filled-in" id="filled-in-box2" />
                    <label for="filled-in-box2">Filled in</label>
                </div>
            </li>

            <li class="short">
                <span>Short By</span>
                <a class='dropdown-button btn' href='#' data-activates='Shorting'>Drop Me!</a>
                <ul id='Shorting' class='dropdown-content'>
                    <li><a href="#!">Low to High</a></li>
                    <li><a href="#!">High to Low</a></li>
                    <li><a href="#!">Price List</a></li>
                </ul>
            </li>
        </ul>--}}
    </div>
</div>
<!-- Filter -->

<script type="text/javascript">var salt = '{{ csrf_token() }}';</script>
<script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
<div class="listing">
    <div class="container">
        <div class="row clearfix">
            <div class="col s12 m12 l12">
                @if(count($organisations) > 0)
                @foreach($organisations as $org)
                <script type="text/javascript">getListData({{$org->id}});</script>
                <img src="{{ asset('images/loading-list.gif') }}" width="100%" height="300px" id="img-block-{{ $org->id }}" />
                <div class="list_con" id="list-block-{{ $org->id }}">
                    <div class="list_div">
                        <div class="list_container">
                            <div class="list_left">
                                <div class="img_con">
                                    <a class="bla" href="{{ url('v/' . $org->city . '/' . $org->url) }}">
                                        <img src="{{ url($org->logo_url) }}" alt="{{ $org->name }}" />
                                    </a>
                                </div>

                                {{-- <div class="ratings">
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star</i>
                                </div> --}}

                                <ul class="so_link" id="xhrSocial{{$org->id}}">
                                </ul>
                            </div>

                            <div class="list_info">
                                <div class="info_top">
                                    <a class="blu" href="{{ url('v/' . $org->city . '/' . $org->url) }}"><h2>{{ $org->name }} (Since - {{ $org->started_year }})</h2></a>
                                    <a class="bla" href="{{ url('v/' . $org->city . '/' . $org->url) }}"><h3><span id="xhrMentorCount{{$org->id}}">0</span> Mentors, <span id="xhrBranchCount{{$org->id}}">0</span> Branches, <span id="xhrSuccessRate{{$org->id}}">0</span>% Sucess rate</h3></a>
                                    <div class="gallerypic" id="xhrGalery{{$org->id}}"></div>
                                </div>
                                <div class="info_bottom">
                                    <p class="mar_head">Major Services</p>
                                    <div class="mar_ser" id="xhrMajorService{{$org->id}}" style="overflow:hidden;"></div>

                                    <p class="mar_head" style="color:#171f2d !important; margin-bottom:5px;">Others</p>
                                    <ul class="service_list" id="xhrOtherService{{$org->id}}"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="list_container_info">
                            {{-- <div class="vote">
                                <span><img src="images/like.png" /></span>
                                <span>0% </span>
                                <span>(0 Votes)</span>
                            </div>

                            <div>
                                <span>
                                    <img src="images/chat.png" />
                                </span>
                                <span><a>0 Feedback</a></span>
                            </div> --}}

                            <div>
                                <span><img src="images/location.png" /></span>
                                <span><a>{{ $org->town .', '. $org->city }}</a></span>
                            </div>

                            <div>
                                <span><img src="images/money.png" /></span>
                                <span>No Assesment Fee</span>
                            </div>

                            <div class="time_con">
                                <span><img src="images/clock.png" /></span>
                                <span>
                                    <span class="time">MON-SAT</span>
                                    <p>8:AM-8:PM</p>
                                </span>
                            </div>

                            {{-- <div>
                                <span><img src="images/event.png" /></span>
                                <span><a href="#" style="color: #04668c; text-decoration: underline; font-weight: 500;">Events For Students</a></span>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col s12 ">
                        <a class="btn book_btn" href="{{ url('v/' . $org->city . '/' . $org->url) }}">Book Appointment</a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="card-panel red lighten-2 white-text">Sorry! Results not found.</div>
                @endif
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
{!! getSearchData() !!}
@endsection