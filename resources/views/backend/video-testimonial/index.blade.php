@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Testimonial</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
                        </div>    
				
			<div class="col s12">
                            <div>
                               <ul class="cus_tab">
                                    <li class="tab"><a  href="{{url('/testimonials')}}">Visa Success</a></li>
                                    <li class="tab"><a  href="{{url('/score')}}">Exam Success</a></li>
                                    <li class="tab"><a class="active" href="{{url('/video-testimonials')}}">Video Testimonial</a></li>
                                    <a class="add_btn" href="{{url('/video-testimonials/add')}}"><i class="material-icons dp48">add_circle</i></a>
                                </ul>
                            </div>
                            
                            <div class="row">
                <table class="all_listing tables">
                        <thead>
                                <tr>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Video Url</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Action</th>
                                </tr>
                        </thead>
                <tbody>
            @if(isset($testimonial))
                @foreach($testimonial as $key=>$val)
                <tr>
                    <td data-label="Name">{{$val['name']}}</td>
                    <td data-label="Video Url" class="over">{{$val['video_url']}}</td>
                    <td data-label="Title">{{$val['title']}}</td>
                    <td data-label="City">{{$val['city']}}</td>
                    

                    <td data-label="Action">
                            <div class="buttons">
                                    <a class="delete_btn" href="{{url('/video-testimonials/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
                                    <a class="edit_btn" href="{{url('/video-testimonials/edit/'.$val['id'])}}"><i class="material-icons dp48">edit</i></a>
                            </div>
                    </td>
                </tr>
                @endforeach
            @endif
             </tbody>
	</table>
        </div> 
			
			</div>
                </div>
	@endsection