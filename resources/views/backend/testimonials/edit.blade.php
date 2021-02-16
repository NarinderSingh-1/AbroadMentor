@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/testimonials')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>testimonial Edit</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row padtp40">
					<form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                                            {!! csrf_field() !!}
						<div class="row">
							<div class="input-field col s6">
                                                            <input id="video_url" type="text" class="validate" name="title" value="{{$visa['title']}}">
								<label for="video_url" data-error="wrong" data-success="right">Title</label>
							</div>
							 <input  type="hidden" class="validate" name="id" value="{{$visa['id']}}">
							<div class="input-field col s6">
                                                            <input id="Name" type="text" class="validate" name="name" value="{{$visa['name']}}">
								<label for="Name" data-error="wrong" data-success="right">Candidate Name</label>
							</div>
							<div class="input-field col s6">
                                                            <input id="city" type="text" class="validate" name="city" value="{{$visa['city']}}">
								<label for="city" data-error="wrong" data-success="right">Candidate City</label>
							</div>
                                                         
                                                         
							<div class="input-field col s6">
							   <div class="file-field">
								  <div class="btn upload_photo">
									<span>Candidate Photo</span>
									<input type="file"  name="profile">
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								  </div>
								</div>
							</div>
							<div class="input-field col s6">
								<select name="refusal">
                                                                    <option value="" disabled selected>After Refusal</option>
                                                                    @foreach($refusal as $key=>$val)
                                                                       <option value="{{$key}}" {{$key==$visa['refuse_count'] ? 'selected' : ''}} >{{$val}}</option>
                                                                    @endforeach
                                                                </select>
							</div>
							
							<div class="input-field col s6">
								<select name="exam">
                                                                    <option value="" disabled selected>Exam</option>
								@foreach($exams as $key=>$val)
                                                                   <option value="{{$key}}" {{$key==$visa['exam_id'] ? 'selected' : ''}} >{{$val}}</option>
                                                                @endforeach
								</select>
							</div>
							
							<div class="input-field col s6">
                                                            <input id="unicollage" type="text" class="validate" name="collage"  value="{{$visa['university']}}">
							  <label for="unicollage"  data-error="wrong" data-success="right">institute/University/Collage</label>
							</div>
							
							<div class="input-field col s6">
								<select name="country">
								<option value="" disabled selected>Country</option>
                                                                @foreach($countries as $key=>$val)
                                                                   <option value="{{$key}}" {{$key==$visa['country_id'] ? 'selected' : ''}} >{{$val}}</option>
                                                                @endforeach
								</select>
							</div>
							
							
							<div class="input-field col s6">
							   <div class="file-field">
								  <div class="btn upload_photo">
									<span>Visa Image</span>
									<input type="file"  name="visa_image">
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								  </div>
								</div>
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