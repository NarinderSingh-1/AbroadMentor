@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/profile/gallery')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Videos</h4>
					<p>Showcase your classes or work on your profile through videos. Upload now.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row">
					<form class="col s12 all_form" action="" enctype="multipart/form-data" method="post" id="video">
                                            {!! csrf_field() !!}
						<div class="row padtp40">
							<div class="col s12">
								<img src="{{ asset('images/video.png') }}" class="file_img"/>
									<p class="center-align" style="font-size:12px;">No Videos uploaded yet</p>
									
								<div class="upload-btn-wrapper">
                                                                    <button class="btn file_btn" type="submit">ADD NEW VIDEO</button>
                                                                    <input type="file" name="video" onchange="uploadFile()" />
								</div>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	@endsection
        @section('footer')
        <script type="text/javascript">
            function uploadFile(){
                $("#video").submit();
            }
            </script>
            @endsection