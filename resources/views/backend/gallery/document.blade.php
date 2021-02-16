@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/profile/gallery')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Documents</h4>
					<p>Showcase your classes or work on your profile through documents. Upload now.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row">
					 <form class="col s12 all_form" action="" enctype="multipart/form-data" method="post" id="documnet">
                                            {!! csrf_field() !!}
						<div class="row padtp40">
							<div class="col s12">
								<img src="{{ asset('images/documnets.png') }}" class="file_img"/>
									<p class="center-align" style="font-size:12px;">No Documents uploaded yet</p>
									
								<div class="upload-btn-wrapper">
                                                                    <button class="btn file_btn" type="submit">ADD NEW DOCUMENT</button>
                                                                    <input type="file" name="document" onchange="uploadFile()"/>
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
                $("#document").submit();
            }
          </script> 
        @endsection  
        