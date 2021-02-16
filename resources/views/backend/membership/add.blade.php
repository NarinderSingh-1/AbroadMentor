@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/membership')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Membership</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
                             <div>
                                           <ul class="cus_tab">
                                                <li class="tab"><a class="active" href="{{url('/membership')}}">Membership</a></li>
                                                    <li class="tab"><a  href="{{url('/achievement')}}">Achievement</a></li>
                                            </ul>
                                    </div>
				<div class="row padtp40">
					
					<!-- Membership -->
					 <form class="col s12 all_form" action="" method="post" role ='form' id="membership" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                @if(isset($membership))
                                                    @foreach($membership as $key=>$val)
							<div class="fill_back">
                                                            <div class="col s12 l7">
								<div class="member_list">
                                                                    <div class="row valign-wrapper">
                                                                        <div class="col s1">
                                                                            <input type="checkbox" class="filled-in" id="filled-in-box_{{$val['id']}}}" {{ isset($membershipDetail[$val['id']]) ? 'checked="true"' : false}}"/>
                                                                                <label for="filled-in-box_{{$val['id']}}}"></label>
                                                                        </div>

                                                                        <div class="col s2">
                                                                            @if(!empty($val['image_url']))
                                                                          <img src="{{asset('images/user.png')}}" alt=""> 
                                                                          @else
                                                                           <img src="{{asset('images/thumb.png')}}" alt="">
                                                                           @endif
                                                                        </div>
                                                                        
                                                                        <div class="col s9 first">
                                                                            <label for="licno"  data-error="wrong" data-success="right"></label>
                                                                          <span>{{$val['title']}}</span>
                                                                          <hr>
                                                                          <span>{{$val['description']}}</span>
                                                                        </div>

                                                                       
                                                                    </div>
								</div>
                                                            </div>
							
                                                            <div class="col s12 l5">
                                                                <label for="licno"  data-error="wrong" data-success="right">LIC No., Ref No.</label>
                                                                <input id="licno" type="text" class="validate" name="membership[{{$val['id']}}]" value="{{ isset($membershipDetail[$val['id']]) ? $membershipDetail[$val['id']] : ''}}">
								
                                                            </div>
							</div>
                                                    @endforeach
                                                @endif    
                                                    <div class="col s12 other">
                                                            <div class="input-field">
                                                                    <input id="other" type="text" class="validate" name="">
                                                                    <label for="other" data-error="wrong" data-success="right">Other</label>
                                                            </div>
                                                    </div>

                                                    <div class="add_certified_con">

                                                    </div>

                                                <a class="add_more col right" id="addcretified"><i class="material-icons add_box">add</i> Add Other</a>
							
							
							<div class="col s12 text-center">
                                                            <button class="btn all-btn" type="submit">Save</button>
							</div>
							
						</div>
					</form>	
					<!-- Membership -->	
					
					
					
				</div>
			</div>
		</div>
@endsection