@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Tie up</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row padtp40">
					<form class="col s12 all_form">
						<div class="row">
							<div class="col s12">
								<div class="input-field col s12 m6 l4">
								  <select name="country">
								<option value="" disabled selected>Country</option>
                                                                @foreach($countries as $key=>$val)
                                                                   <option value="{{$key}}">{{$val}}</option>
                                                                @endforeach
								</select>
								</div>
								
								<div class="input-field col s12 m6 l4">
								   <input id="lastname" type="email" class="validate" name="university">
								   <label for="lastname" data-error="wrong" data-success="right">Last Name*</label>
								</div>
								
								<div class="input-field col s12 m6 l4">
								   <a class="add_more" id="add_tieup"><i class="material-icons add_box">add</i> Add more</a>
								</div>
							</div>
							
							<div class="col s12">
								<div class="tie_con">
									
								</div>
							</div>
							
						</div>
                                            <div class="col s12 text-center">
                                                <a class="btn all-btn">Submit</a>
                                            </div>
					</form>
				</div>
				
				
			</div>
		</div>
@endsection
	