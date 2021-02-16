@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{ url('/profile') }}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Gallery</h4>
					<p>Add or remove photos, videos and documents to be displayed on your profile.</p>
				</span>
			</div>
			<div class="col s12">
				<ul class="info-tab">
					<li>
						<a href="{{url('/profile/intro')}}">
							<span class="icon"><img src="{{ asset('images/intro_video.png') }}" /></span>
							<span>
								<h4>Intro Video</h4>
								<small>
									<span class="red-color">You haven’t uploaded an Intro Video yet. </span>
								</small>
							</span>	
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
					
					<li>
						<a href="{{url('/profile/image')}}">
							<span class="icon"><img src="{{ asset('images/gallery.png') }}" /></span>
							<span>
								<h4>Photos</h4>
								<small class="red-color">You haven’t uploaded any photos yet.</small>
							</span>
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
					
					<li>
						<a href="{{url('/profile/video')}}">
							<span class="icon"><img src="{{ asset('images/video.png') }}" width="24" /></span>
							<span>
								<h4>Videos</h4>
								<small class="red-color">You haven’t uploaded any videos yet.</small>
							</span>
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
					
					<li>
						<a href="{{url('/profile/document')}}">
							<span class="icon"><img src="{{ asset('images/about_ins.png') }}" /></span>
							<span>
								<h4>Documents</h4>
								<small class="red-color">No documents uploaded</small>
							</span>
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	@endsection
       
  