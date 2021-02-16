@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Event</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
				<a class="all_add_btn" href="{{url('/event/add')}}"><i class="material-icons add_box">add</i> Add</a>
			</div>
			<div class="col s12">
				<div class="row padtp40">
					<ul class="collapsible all_listing" data-collapsible="accordion">
                                            @if(isset($events))
                                            @foreach($events as $key=>$val)
						<li>
							<div class="collapsible-header">
								<div class="info">
									<span><small>Event Name:</small> <strong>{{$val['name']}}</strong></span> <span><small>Category:</small> <strong>{{$val['category']}}</strong></span> <span><small>City:</small> <strong>{{$val['city']}}</strong></span>
								</div>
								<div class="buttons">
                                                                    
									<a class="delete_btn"  href="{{url('event/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i> Delete</a>
									<a class="edit_btn"  href="{{url('event/edit/'.$val['id'])}}"><i class="material-icons">border_color</i> Edit</a>
                                                                </div>
							</div>
							
						    <div class="collapsible-body">
								
                                                        <div>
                                                            <small>Introduction</small>
                                                            <p>{{$val['introduction']}}</p>
                                                        </div>

                                                        <div>
                                                                <small>Event Date</small>
                                                                <p>{{$val['date']}}</p>
                                                        </div>

                                                        <div>
                                                                <small>Start Time</small>
                                                                <p>{{$val['start_time']}}</p>
                                                        </div>

                                                        <div>
                                                                <small>End Time</small>
                                                                <p>{{$val['end_time']}}</p>
                                                        </div>
                                                        <div>
                                                                <small>Uni/Collage</small>
                                                                <p>{{$val['collage']}}</p>
                                                        </div>
                                                        <div>
                                                                <small>Country</small>
                                                                <p>{{$val['country']}}</p>
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
	@endsection