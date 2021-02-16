<div class="row">
	<div class="col l12">
		<a class="waves-effect waves-light btn modal-trigger right" href="#addNewMentor">Add New Mentor</a>
	</div>
</div>

<div class="row">
	<div class="col m4">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="http://materializecss.com/images/office.jpg">
			</div>
			<div class="card-content">
				<a class="btn-floating halfway-fab waves-effect waves-light green" style="bottom: 90px;right: 14px;">
					<i class="material-icons">edit</i>
				</a>
				<span class="card-title activator grey-text text-darken-4">Card Title
					<i class="material-icons right">more_vert</i>
				</span>
				<p>
					<a href="#">This is a link</a>
				</p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Card Title
					<i class="material-icons right">close</i>
				</span>
				<p>Here is some more information about this product that is only revealed once clicked on.</p>
			</div>
		</div>
	</div>
	<div class="col m4">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="http://materializecss.com/images/office.jpg">
			</div>
			<div class="card-content">
				<a class="btn-floating halfway-fab waves-effect waves-light green" style="bottom: 90px;right: 14px;">
					<i class="material-icons">edit</i>
				</a>
				<span class="card-title activator grey-text text-darken-4">Card Title
					<i class="material-icons right">more_vert</i>
				</span>
				<p>
					<a href="#">This is a link</a>
				</p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Card Title
					<i class="material-icons right">close</i>
				</span>
				<p>Here is some more information about this product that is only revealed once clicked on.</p>
			</div>
		</div>
	</div>
	<div class="col m4">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="http://materializecss.com/images/office.jpg">
			</div>
			<div class="card-content">
				<a class="btn-floating halfway-fab waves-effect waves-light green" style="bottom: 90px;right: 14px;">
					<i class="material-icons">edit</i>
				</a>
				<span class="card-title activator grey-text text-darken-4">Card Title
					<i class="material-icons right">more_vert</i>
				</span>
				<p>
					<a href="#">This is a link</a>
				</p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Card Title
					<i class="material-icons right">close</i>
				</span>
				<p>Here is some more information about this product that is only revealed once clicked on.</p>
			</div>
		</div>
	</div>
</div>

<!-- Modal Structure -->
<div id="addNewMentor" class="modal">
	<div class="modal-content">
		<h4>Add New Mentor</h4>
		<div class="row">
			<form class="col s12" action="{{ url('mentors') }}" autocomplete="off">
				{!! csrf_field() !!}
				<div class="row">
					<div class="col l6">
						<div class="input-field col s12">
							<input id="first_name" type="text" class="validate">
							<label for="first_name">First Name</label>
						</div>
						<div class="input-field col s12">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Last Name</label>
						</div>
						<div class="input-field col s12">
							<input id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>
						<div class="input-field col s12">
							<input id="qualification" type="text" class="validate">
							<label for="qualification">Qualification</label>
						</div>
					</div>
					<div class="col l6">
						<div class="input-field col s12">
							<input id="specialist" type="text" class="validate">
							<label for="specialist">Specialist In</label>
						</div>
						<div class="input-field col s12">
							<input id="experience" type="text" class="validate">
							<label for="experience">Experience</label>
						</div>
						<div class="input-field col s12">
							<input id="fee" type="text" class="validate">
							<label for="fee">Consultant Fee</label>
						</div>
						<div class="input-field file-field col s12">
							<div class="btn btn-sm grey lighten-5 black-text">
								<span>Profile Image</span>
								<input type="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" id="fileuploader" type="text" placeholder="Allowed jpeg, jpg, png and less than 5MB only.">
								<div class="progress">
									<div class="determinate" id="progressBar" style="width: 70%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect btn red">
			<i class="material-icons right">close</i> Cancel</a>
		<a href="#!" class="modal-action waves-effect btn green">
			<i class="material-icons right">send</i> Submit </a>
	</div>
</div>

<script type="text/javascript" src="/js/simpleUpload.min.js"></script>
<script type="text/javascript">
// http://simpleupload.michaelcbrook.com/#examples
jQuery(document).ready(function() {
	$('#fileuploader').change(function() {

		$(this).simpleUpload("{{ url('agency/mentors/upload') }}", {

            allowedExts: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],
			maxFileSize: 5000000, //5MB in bytes
            data: {'_token': '{{ csrf_token() }}'},
			start: function(file){
				$('#progressBar').width(0);
			},
			progress: function(progress){
				$('#progressBar').width(progress + "%");
			},
			success: function(data){
                console.log(data);
			},
			error: function(error) {
				console.log(error);
			}
		});
	});
});
</script>