@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/testimonials')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Testimonial Add</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row padtp40">
					<form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                                            {!! csrf_field() !!}
						<div class="row">
							<div class="input-field col s6">
                                                            <input id="video_url" type="text" class="validate" name="title">
								<label for="video_url" data-error="wrong" data-success="right">Title</label>
							</div>
							
							<div class="input-field col s6">
                                                            <input id="Name" type="text" class="validate" name="name">
								<label for="Name" data-error="wrong" data-success="right">Candidate Name</label>
							</div>
                                                    
                                                        <div class="input-field col s6">
                                                            <input id="city" type="text" class="validate" name="city">
								<label for="city" data-error="wrong" data-success="right">Candidate City</label>
							</div>
                                                    
                                                       
							
							<div class="input-field col s6">
                                                            <input id="video_url" type="text" class="validate" name="video_url">
							  <label for="video_url"  data-error="wrong" data-success="right">Youtube Url</label>
                                                          <img src="{{ asset('images/youtube.png') }}" class="you_ic"/>
							</div>
							
						</div>
						
						<div class="col s12 text-center">
							<button class="btn all-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endsection