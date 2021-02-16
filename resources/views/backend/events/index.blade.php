@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Event</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
				<a class="add_btn" href="{{url('/event/add')}}"><i class="material-icons dp48">add_circle</i></a>
			</div>
			<div class="col s12">
				<div class="row padtp40">
                                    <ul class="event_list">
                                        @if(isset($events))
                                        @foreach($events as $key=>$val)
                                        <li>
                                            
                                            <div>
                                                <span><strong>Event Name</strong>: {{$val['name']}}</span>
                                                <span><strong>Category</strong>: {{$val['category']}}</span>
                                                <span><strong>City</strong>: {{$val['city']}}</span>
                                                <span>
                                                            <strong>Introduction: </strong>
                                                            {{$val['introduction']}}
                                                        </span>

                                                        <span>
                                                                <strong>Event Date</strong>
                                                                {{$val['date']}}
                                                        </span>

                                                        <span>
                                                                <strong>Start Time</strong>
                                                                {{$val['start_time']}}
                                                        </span>

                                                        <span>
                                                                <strong>End Time</strong>
                                                                {{$val['end_time']}}
                                                        </span>
                                                        <span>
                                                                <strong>Uni/Collage</strong>
                                                                {{$val['collage']}}
                                                        </span>
                                                        <span>
                                                                <strong>Country</strong>
                                                                {{$val['country']}}
                                                        </span>
                                            </div>
                                            
                                            <div style="background: #f9f9f9; display: block; float: left; width: 100%; text-align: center;">
                                                <a class="delete_btn"  href="{{url('event/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
                                                <a class="edit_btn"  href="{{url('event/edit/'.$val['id'])}}"><i class="material-icons dp48">edit</i></a>
                                            </div>
                                        </li>
                                        @endforeach
                                        @else 
                                        <p> No Event Found </p>
                                        @endif
				</div>
			</div>
                </div>
	@endsection