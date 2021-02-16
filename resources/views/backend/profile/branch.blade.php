@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/profile')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Branchs</h4>
            <p>manage Information related to all of your branches here.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row">
            <ul class="info-tab">
                @if(isset($branches))
                @foreach($branches as $key=>$val)
                <li>
                    <a href="/profile/branch/edit/{{$val->id}}">
                        <span>
                            <h4>{{ucfirst($val->address)}}</h4>
                            <small>
                                <span>{{ucfirst($val->address)}}</span>, <span>{{$val->country}}- {{$val->pincode}}.</span>
                            </small>
                        </span>	
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                @endforeach
                <li>
                    <a href="/profile/branch/add">
                        <span>
                            <h4>Add another Branch</h4>
                        </span>
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                @else
                <p> No Record Found</p>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection