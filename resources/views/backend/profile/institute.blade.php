@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/profile')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Profile Information</h4>
            <p>Update your profile as it appears on Profile.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row">
            <form class="col s12 all_form" action="{{ url('profile/institute') }}" method="post" role ='form'>
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input id="Institute_Name" name="name" type="text" class="validate" value="{{ isset($organisation->name) ? $organisation->name : '' }}">
                        <label for="Institute_Name">Institute Name*</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="regestration" name="regestration" type="text" class="validate" value="{{ isset($organisation->registration_number) ? $organisation->registration_number : '' }}">
                        <label for="email">Regestration No</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select name="year">
                            <option value="" disabled selected>Select</option>
                            @php
                            $year = isset($organisation->started_year) ? $organisation->started_year : 0;
                            @endphp
                            @for($i = date('Y'); $i >= (date('Y') - 30); $i--)
                            <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <label>Year Of Establishment*</label>
                    </div>
                     
                    <div class="input-field col s12 m6 l6">
                        <input id="email" name="email" type="email" class="validate" value="{{ isset($userMeta->alternative_email) ? $userMeta->alternative_email : '' }}">
                        <label for="email">Alternative Email address*</label>
                    </div>   
                    
                    <div class="input-field col s12 m6 l6">
                        <input id="address" name="address" type="text" class="validate" value="{{ isset($organisation->address) ? $organisation->address : '' }}">
                        <label for="address">Business Address*</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="town" name="town" type="text" class="validate" value="{{ isset($organisation->town) ? $organisation->town : '' }}">
                        <label for="town">Town*</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select name="city">
                            <option value="" disabled selected>Select City</option>
                            @foreach($cities as $key=>$val)
                            @if($organisation->city_id == $key )
                            <option value="{{$key}}"  selected>{{$val}}</option>
                            @else
                             <option value="{{$key}}">{{$val}}</option>
                             @endif
                            @endforeach
                        </select> 
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="state" name="state" type="text" class="validate" value="{{ isset($organisation->state) ? $organisation->state : '' }}">
                        <label for="state">State*</label>
                    </div>   
                    <div class="input-field col s12 m6 l6">
                        <input id="zip_code" name="zip_code" type="text" class="validate" value="{{ isset($organisation->zipcode) ? $organisation->zipcode : '' }}">
                        <label for="zip_code">Zip Code*</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="phone" name="phone" type="number" class="validate" value="{{ isset($userMeta->phone) ? $userMeta->phone : '' }}">
                        <label for="phone">Landline No*</label>
                    </div>   
                    <div class="input-field col s12 m6 l6">
                        <input id="mobile" name="mobile" type="number" class="validate" value="{{ isset($userMeta->mobile) ? $userMeta->mobile : '' }}">
                        <label for="mobile">Mobile*</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="alternative_mobile" name="alternative_mobile" type="number" class="validate" value="{{ isset($userMeta->alternative_mobile) ? $userMeta->alternative_mobile : '' }}">
                        <label for="alternative_mobile">Alternative Mobile</label>
                    </div>   
                    <div class="input-field col s12 m6 l6">
                        <input id="Blog" name="blog" type="text" class="validate" value="{{ isset($organisation->primary_website) ? $organisation->primary_website : '' }}">
                        <label for="Blog">Website or Blog</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                         <select name="office_type">
                            <option value="" disabled selected>Select</option>
                            @foreach($officeType as $key=>$val)
                            @if($organisation->office_type_id == $key )
                            <option value="{{$key}}"  selected>{{$val}}</option>
                            @else
                             <option value="{{$key}}">{{$val}}</option>
                             @endif
                            @endforeach
                        </select> 
                        <label>Office Type*</label>
                    </div>
                    
                </div>
                <button class="btn all-btn" type="submit" >Done</button>
            </form>
        </div>

    </div>
</div>
@endsection