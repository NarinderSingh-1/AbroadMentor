@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span>
                <h4>Mentors</h4>
                <p>manage Information related to all of your branches here.</p>
        </span>
        <a class="add_btn" href="{{url('/mentor/add')}}"><i class="material-icons dp48">add_circle</i></a>
    </div>
    <div class="col s12">
        <div class="row">
                <table class="all_listing tables">
                                <thead>
                                        <tr>
                                                <th scope="col">Member Photo</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Qualification</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Contact No.</th>
                                                <th scope="col">Experience</th>
                                                <th scope="col">Professional Skills</th>
                                                <th scope="col">Certified From</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                        <tbody>
            @if(isset($mentors))
                @foreach($mentors as $key=>$val)
                <tr>
                    <td data-label="Member Photo">
                        <div class="pic">									
                                <a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
                                        <img class="example-image" src="images/dr-anupam.jpg" alt=""/>
                                </a>
                        </div>
                    </td>

                    <td data-label="Name">{{$val['first_name'] . " " . $val['last_name']}}</td>
                    <td data-label="Email" class="over">{{$val['email']}}</td>
                    <td data-label="Qualification">{{$val['qualification']}}</td>
                    <td data-label="Designation">{{$val['designation']}}</td>
                    <td data-label="Contact No.">{{$val['phone']}}</td>
                    <td data-label="Experience">{{$val['experience']}}</td>
                    <td data-label="Professional Skills">{{$val['services']}}</td>
                    <td data-label="Certified From">{{$val['memberships']}}</td>

                    <td data-label="Action">
                            <div class="buttons">
                                    <a class="delete_btn" href="{{url('/mentor/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
                                    <a class="edit_btn" href="{{url('/mentor/edit/'.$val['id'])}}"><i class="material-icons dp48">edit</i></a>
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