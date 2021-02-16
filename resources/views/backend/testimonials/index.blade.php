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
                            <div class="">
                                <ul class="cus_tab">
                                    <li class="tab"><a class="active" href="{{url('/testimonials')}}">Visa Success</a></li>
                                    <li class="tab"><a  href="{{url('/score')}}">Exam Success</a></li>
                                    <li class="tab"><a  href="{{url('/video-testimonials')}}">Video Testimonial</a></li>
                                    <a class="add_btn" href="{{url('/testimonials/add')}}"><i class="material-icons dp48">add_circle</i></a>
                                </ul>
                            </div>
                            
        <div class="row">
                <table class="all_listing tables">
                        <thead>
                                <tr>
                                        <th scope="col">Member Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Exam</th>
                                        <th scope="col">After Refusal</th>
                                        <th scope="col">Uni/Collage</th>
                                        <th scope="col">Visa Image</th>
                                        <th scope="col">Action</th>
                                </tr>
                        </thead>
                <tbody>
            @if(isset($visa))
                @foreach($visa as $key=>$val)
                <tr>
                    <td data-label="Member Photo">
                        <div class="pic">									
                                <a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
                                        <img class="example-image" src="images/dr-anupam.jpg" alt=""/>
                                </a>
                        </div>
                    </td>

                    <td data-label="Name">{{$val['name']}}</td>
                    <td data-label="Email" class="over">{{$val['country_name']}}</td>
                    <td data-label="Qualification">{{$val['address']}}</td>
                    <td data-label="Designation">{{$val['exam_name']}}</td>
                    <td data-label="Contact No.">{{$val['refuse_count']}}</td>
                    <td data-label="Experience">{{$val['university']}}</td>
                     <td data-label="Member Photo">
                        <div class="pic">									
                                <a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
                                        <img class="example-image" src="images/dr-anupam.jpg" alt=""/>
                                </a>
                        </div>
                    </td>

                    <td data-label="Action">
                            <div class="buttons">
                                    <a class="delete_btn" href="{{url('/testimonials/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
                                    <a class="edit_btn" href="{{url('/testimonials/edit/'.$val['id'])}}"><i class="material-icons dp48">edit</i></a>
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