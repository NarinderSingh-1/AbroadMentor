@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Score</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
			</div>
			<div class="col s12">
                            <div>
                                <ul class="cus_tab">
                                    <li class="tab"><a  href="{{url('/testimonials')}}">Visa Success</a></li>
                                    <li class="tab"><a class="active" href="{{url('/score')}}">Exam Success</a></li>
                                    <li class="tab"><a  href="{{url('/video-testimonials')}}">Video Testimonial</a></li>
                                    <a class="add_btn" href="{{url('/score/add')}}"><i class="material-icons dp48">add_circle</i></a>
                                </ul>
                            </div>
                            
                            <div class="row">
                <table class="all_listing tables">
                        <thead>
                                <tr>
                                        <th scope="col">Candidate Photo</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Exam</th>
                                        <th scope="col">Score</th>
                                        <th scope="col">Visa Image</th>
                                        <th scope="col">Action</th>
                                </tr>
                        </thead>
                <tbody>
            @if(isset($scores))
                @foreach($scores as $key=>$val)
                <tr>
                    <td data-label="Member Photo">
                        <div class="pic">									
                                <a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
                                        <img class="example-image" src="images/dr-anupam.jpg" alt=""/>
                                </a>
                        </div>
                    </td>

                    <td data-label="Name">{{$val['student_name']}}</td>
                    <td data-label="Email" class="over">{{$val['exam_name']}}</td>
                    <td data-label="Qualification">{{$val['overall']}}</td>
                     <td data-label="Visa Image">
                        <div class="pic">									
                                <a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
                                        <img class="example-image" src="images/dr-anupam.jpg" alt=""/>
                                </a>
                        </div>
                    </td>

                    <td data-label="Action">
                            <div class="buttons">
                                    <a class="delete_btn" href="{{url('/score/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
                                    <a class="edit_btn" href="{{url('/score/edit/'.$val['id'])}}"><i class="material-icons dp48">edit</i></a>
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