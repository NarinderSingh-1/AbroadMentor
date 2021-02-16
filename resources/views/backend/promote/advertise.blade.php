@extends('backend.layout')
@section('content')
		<div class="row">
                    <div class="info_head">
                        <span><a href="{{url('/mentor')}}"><i class="material-icons">arrow_back</i></a></span>
                            <span>
                                <h4>Promote</h4>
                                <p>manage Information related to all of your branches here.</p>
                            </span>
                            <a class="all_add_btn" href="{{url('/promote/advertisement/add')}}"><i class="material-icons add_box">add</i> Add</a>
                    </div>
                     <div class="col s12">
			<div class="col s12">
                                        <ul class="tab">
                                            <li class="tab"><a  href="{{url('/promote')}}">Upgrade</a></li>
                                            <li class="tab"><a  class="active" href="{{url('/promote/advertisement')}}">Advertise</a></li>
                                            <li class="tab"><a  href="{{url('/promote/promote')}}">Promote</a></li>
                                        </ul>
                                    </div>
                            <div class="row padtp40">
					<ul class="collapsible all_listing" data-collapsible="accordion">
                                            @if(isset($advertisements))
                                            @foreach($advertisements as $key=>$val)
						<li>
							<div class="collapsible-header">
								<div class="info">
									<span><small>Company Name:</small> <strong>{{$val['company_name']}}</strong></span> <span><small>City:</small> <strong>{{$val['city']}}</strong></span>
								</div>
								<div class="buttons">
                                                                    
									<a class="delete_btn"  href="{{url('promote/advertisement/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
									<a class="edit_btn"  href="{{url('promote/advertisement/edit/'.$val['id'])}}"><i class="material-icons">border_color</i></a>
                                                                </div>
							</div>
							
						    <div class="collapsible-body">
								
                                                        <div>
                                                            <small>First Name</small>
                                                            <p>{{$val['first_name']}}</p>
                                                        </div>

                                                        <div>
                                                                <small>Last Name</small>
                                                                <p>{{$val['last_name']}}</p>
                                                        </div>

                                                        <div>
                                                                <small>Mobile No</small>
                                                                <p>{{$val['mobile']}}</p>
                                                        </div>

                                                        <div>
                                                                <small>Landline No</small>
                                                                <p>{{$val['phone']}}</p>
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