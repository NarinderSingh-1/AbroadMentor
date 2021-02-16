@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/achievement')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Achievement</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row padtp40">
					<!-- Achievement -->
					<form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                                            {!! csrf_field() !!}
						<div class="row">
							<div class="input-field col s12">
								<input id="title" type="text" class="validate" name="title" value="{{$achievement['title']}}">
								<label for="title"  data-error="wrong" data-success="right">Title</label>
							</div>
							
							<div class="input-field col s12">
							   <textarea id="textarea1" class="materialize-textarea" name="description">{{$achievement['description']}}</textarea>
							   <label for="textarea1">Description</label>
							</div>
							
							<div class="input-field col s12">
								<input type="text" class="datepicker" name="date" value="{{$achievement['year']}}">
								<label for="date" class="">Date</label>
							</div>
							
                                                        <input type="hidden" name="id" value="{{$achievement['id']}}">
							<div class="input-field col s12">
							   <div class="file-field">
								  <div class="btn upload_photo">
									<span>Image Browse</span>
                                                                        <input type="file" name="myfile">
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								  </div>
								</div>
							</div>
						</div>
						
						<div class="col s12 text-center">
                                                    <button type="submit" class="btn all-btn">Submit</button>
						</div>
					</form>
                                        
				</div>
			</div>
		</div>
@endsection