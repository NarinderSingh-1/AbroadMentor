@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
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
                                    <div id="membership">
                                    <a class="edit_btn" href="{{url('membership/edit')}}"><i class="material-icons">border_color</i></a>
                                    <div class="col s12 all_form" >
                                        
                                        @if(isset($membership))
                                        @foreach($membership as $key=>$val)
					<ul class="collapsible all_listing" data-collapsible="accordion">
						<li>
							<div class="collapsible-header">
								<div class="info">
									<span><small>Title:</small> <strong>{{$val['title']}}</strong></span>
								</div>

							</div>
							
						    <div class="collapsible-body">
                                                                <div>
									<small>Value</small>
									<p> {{ isset($membershipDetail[$val['id']]) ? $membershipDetail[$val['id']] : ''}}</p>
                                                                </div>
								<div>
									<small>Description</small>
									<p> {{$val['description']}}</p>
                                                                </div>
								
								<div>
									<small>Member Photo</small>
									<div class="pic">									
										<a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
											<img class="example-image" src="images/dr-anupam.jpg" alt=""/>
										</a>
									</div>
								</div>
								
						    </div>
						</li>
						@endforeach
                                                @else 
                                                <p> No record found </p>
                                                @endif
					</ul>
                                    </div>    
                                    </div>
                                   
				</div>
			</div>
		</div>
	@endsection