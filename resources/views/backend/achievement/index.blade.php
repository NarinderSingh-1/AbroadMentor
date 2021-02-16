@extends('backend.layout')
@section('content')
		<div class="row">
			<div class="info_head">
				<span>
					<h4>Achievement</h4>
					<p>manage Information related to all of your branches here.</p>
				</span>
				
			</div>
			<div class="col s12">
                            <div>
                                <ul class="cus_tab">
                                         <li class="tab"><a href="{{url('/membership')}}">Membership</a></li>
                                         <li class="tab"><a  class="active" href="{{url('/achievement')}}">Achievement</a></li>
                                          <a class="add_btn" href="{{url('/achievement/add')}}"><i class="material-icons dp48">add_circle</i></a>
                                 </ul>
                            </div>
                           
                            <div class="row">
                <table class="all_listing tables">
                    <thead>
                            <tr>
                                    <th scope="col">Member Photo</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                            </tr>
                    </thead>
                <tbody>
            @if(isset($achievement))
                @foreach($achievement as $key=>$val)
                <tr>
                    <td data-label="Member Photo">
                        <div class="pic">									
                                <a class="example-image-link" href="images/dr-anupam.jpg" data-lightbox="example-set1" data-title="">
                                        <img class="example-image" src="images/dr-anupam.jpg" alt=""/>
                                </a>
                        </div>
                    </td>

               
                    <td data-label="Title">{{$val['title']}}</td>
                    <td data-label="Description">{{$val['description']}}</td>

                    <td data-label="Action">
                            <div class="buttons">
                                    <a class="delete_btn" href="{{url('/achievement/delete/'.$val['id'])}}"><i class="material-icons dp48">delete</i></a>
                                    <a class="edit_btn" href="{{url('/achievement/edit/'.$val['id'])}}"><i class="material-icons dp48">edit</i></a>
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