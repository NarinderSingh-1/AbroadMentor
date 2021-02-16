@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span><a href="{{url('/profile/gallery')}}"><i class="material-icons">arrow_back</i></a></span>
				<span>
					<h4>Intro Video</h4>
					<p>An Intro Video adds credibility to your profile.</p>
				</span>
			</div>
			<div class="col s12">
				<div class="row">
					<form class="col s12 all_form" action="" enctype="multipart/form-data" method="post" id="intro">
                                            {!! csrf_field() !!}
						<div class="row">
							<div class="content_box" style="border:none !important;">
								<p class="center-align" style="font-size: 14px; text-align: left; color: #000; margin: 0;">Upload a short Intro Video Block</p>
								<ul class="bullet">
									<li>An Intro Video adds credibility to your profile.</li>
									<li>Keep your video short & sweet between 2-5 mins.</li>
									<li>Record with your smartphone and upload now.</li>
								</ul>
								
								<div class="upload-btn-wrapper" style="display:inline-block; margin-bottom:5px;">
                                                                    <button class="btn file_btn" type="submit">UPLOAD INTRO VIDEO</button>
								  <input id="file" type="file" name="intro" onchange="uploadFile()" />
								</div>
								<p class="center-align" style="text-align:left; margin-bottom:20px;">(Video format supported .mp4 .flv .mpeg .mov .wmv .avi and maximum file size-500MB)</p>
								
								<p class="center-align" style="font-size: 14px; text-align: left; color: #000; margin: 0;">Some ideas on what to talk about in an Intro Video:</p>
								
								<ul class="bullet">
									<li>A brief intro about yourself</li>
									<li>Experience and expertise as a Tutor</li>
									<li>Awards you won for providing quality education</li>
									<li>What is your style of teaching?</li>
									<li>What makes you passionate about teaching?</li>
									<li>Technologies you use for teaching</li>
									<li>Any other teaching related details</li>
								</ul>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	@endsection
        
@section('footer')
<script type="text/javascript">
   function uploadFile() {
      $("#intro").submit();
   
}
</script>

@endsection