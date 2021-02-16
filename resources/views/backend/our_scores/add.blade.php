@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
                                <span><a href="{{url('/score')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Our Scores</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row padtp40">
						<div class="row">
							<div class="col s12">
                                                            <ul class="tabs list-tab">
                                                                @foreach($exams as $key => $val)
                                                                <li class="tab"><a  href="#{{strtolower($val)}}">{{$val}}</a></li>
                                                                @endforeach
                                                            </ul>
							</div>
							
							<div class="col s12">
								@foreach($exams as $key => $val)
								<div id="{{strtolower($val)}}">
									<form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                                                                            {!! csrf_field() !!}
                                                                            <input type="hidden" name="exam" value="{{$key}}">
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
                                                                            
                                                                            @if(strtolower($val) == "ielse" || strtolower($val) == "pte")
										<div class="input-field col s6">
											<input id="reading" type="number" class="validate" name="reading">
											<label for="reading"  data-error="wrong" data-success="right">Reading</label>
										</div>
										
										<div class="input-field col s6">
											<input id="writing" type="number" class="validate" name="writing">
											<label for="writing"  data-error="wrong" data-success="right">Writing</label>
										</div>
										
										<div class="input-field col s6">
											<input id="writing1" type="number" class="validate" name="listening">
											<label for="writing1"  data-error="wrong" data-success="right">Listening</label>
										</div>
										
										<div class="input-field col s6">
											<input id="speaking" type="number" class="validate" name="speaking">
											<label for="speaking"  data-error="wrong" data-success="right">Speaking</label>
										</div>
                                                                               
                                                                                
										<div class="input-field col s6">
                                                                                    <input id="overall" type="number" class="validate" name="score">
											<label for="overall"  data-error="wrong" data-success="right">Overall Score</label>
										</div>
                                                                            @else
										<div class="input-field col s6">
											<input id="overall" type="number" class="validate" name="score">
											<label for="overall"  data-error="wrong" data-success="right">Score</label>
										</div>
									    @endif	
										
										
										<div class="input-field col s6">
										   <div class="file-field">
											  <div class="btn upload_photo">
												<span>Score Card</span>
												<input type="file" name="score_image">
											  </div>
											  <div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											  </div>
											</div>
										</div>
										
										<div class="col s6">
                                                                                    <button type="submit" class="btn all-btn">Save</button>
										</div>
									</form>	
								</div>
                                                                 @endforeach
								<!-- SAT -->
							</div>	
                                                </div>
				</div>
				<!--a class="btn all-btn">Save</a-->
			</div>
		</div>
	@endsection