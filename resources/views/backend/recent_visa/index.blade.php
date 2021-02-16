@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Recent Visa</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row padtp40">
					<form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                                <div class="row">
							<div class="input-field col s12 m6 l4">
							  <input id="Name" type="text" class="validate" name="name">
							  <label for="Name"  data-error="wrong" data-success="right">Name</label>
							</div>
							
							<div class="input-field col s12 m6 l4">
							   <input id="address" type="text" class="validate" name="address">
							   <label for="address" data-error="wrong" data-success="right">Address</label>
							</div>
							
							<div class="input-field col s12 m6 l4">
								<select name="exam">
                                                                    <option value="" disabled selected>Exam</option>
								@foreach($exams as $key=>$val)
                                                                   <option value="{{$key}}">{{$val}}</option>
                                                                @endforeach
								</select>
							</div>
							
							<div class="input-field col s12 m6 l8">
								<div >
									<div class="col s12 m6 l6">
										<select name="refusal">
											<option value="" disabled selected>After Refusal</option>
											<option value="1">1</option>
											<option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
								
									<div class="col s12 m6 l6">
										<select name="score">
											<option value="" disabled selected>Score</option>
                                                                                        <option value="4">4</option>
											<option value="4.5">4.5</option>
                                                                                        <option value="5">5</option>
                                                                                        <option value="5.5">5.5</option>
											<option value="6">6</option>
											<option value="6.5">6.5</option>
                                                                                        <option value="7">7</option>
											<option value="7.5">7.5</option>
                                                                                        <option value="8">8</option>
											<option value="8.5">8.5</option>
											<option value="9">9</option>
											
										</select>
									</div>
								</div>
							</div>
							
							<div class="input-field col s12 m6 l4">
							  <input id="unicollage" type="text" class="validate" name="collage">
							  <label for="unicollage"  data-error="wrong" data-success="right">Uni/Collage</label>
							</div>
							
							<div class="input-field col s12 m6 l4">
								<select name="country">
								<option value="" disabled selected>Country</option>
                                                                @foreach($countries as $key=>$val)
                                                                   <option value="{{$key}}">{{$val}}</option>
                                                                @endforeach
								</select>
							</div>
							
							<div class="input-field col s12 m6 l4">
							   <div class="file-field">
								  <div class="btn upload_photo">
									<span>Candidate Photo</span>
									<input type="file" name="profile">
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								  </div>
								</div>
							</div>
							
							<div class="input-field col s12 m6 l4">
							   <div class="file-field">
								  <div class="btn upload_photo">
									<span>Visa Image</span>
									<input type="file" name="visa_image">
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								  </div>
								</div>
							</div>
						</div>
                                            <button class="btn all-btn">Save</button>
					</form>
				</div>
                            
			</div>
		</div>
@endsection	