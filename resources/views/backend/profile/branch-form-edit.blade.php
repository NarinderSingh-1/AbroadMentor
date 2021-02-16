@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/profile/branch')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Address</h4>
            <p>Set your location, so we can send you near by enquires.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row">
            <form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                {!! csrf_field() !!}
                
                <input type="hidden" name="id" value="{{isset($branch->id) ? $branch->id : ''}}">
                <div class="row">
                    <div class="input-field col s12 m6 l4">
                        <input id="address" name="address" type="text" class="validate" value="{{isset($branch->address) ? $branch->address : ''}}">
                      <label for="address"  data-error="wrong" data-success="right">Address*</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                       <input id="landmark" name="landmark" type="text" class="validate" value="{{isset($branch->landmark) ? $branch->landmark : ''}}">
                       <label for="landmark" data-error="wrong" data-success="right">Landmark</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                        <select name="country">
                            <option value="" disabled selected>Select</option>
                            @foreach($countries as $key=>$val)
                            <option value="{{$key}}" selected="{{($key == $branch->country_id) ? true :''}}">{{$val}}</option>
                            @endforeach
                        </select>
                        <label>Country</label>
                    </div>
                    
                    <div class="input-field col s12 m6 l4">
                       <input id="pin" name="pin" type="text" class="validate" value="{{isset($branch->pincode) ? $branch->pincode : ''}}">
                       <label for="pin" data-error="wrong" data-success="right">Pin Code*</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                      <input id="phone" name="phone" type="text" class="validate" value="{{isset($branch->phone) ? $branch->phone : ''}}">
                      <label for="phone"  data-error="wrong" data-success="right">Phone Number*</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                      <input id="email" name="email" type="email" class="validate" value="{{isset($branch->email) ? $branch->email : ''}}">
                      <label for="email"  data-error="wrong" data-success="right">Email*</label>
                    </div>
                    
                    <div class="input-field col s12 m6 l6">
                      <select name="from_day">
                            <option value="" disabled selected>Select</option>
                            @foreach($days as $key => $val)
                            <option value="{{$key}}" selected="{{($key == $branch->from_day) ? true :''}}">{{$val}}</option>
                            @endforeach
                      </select>
                      <label>From Day*</label>
                    </div>
                    
                    <div class="input-field col s12 m6 l6">
                        <input id="from_time" name="from_time" type="text" class="datepicker" readonly="true" value="{{isset($branch->from_time) ? $branch->from_time : ''}}">
                      <label for="from_time"  data-error="wrong" data-success="right">From Time*</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <select name="to_day">
                            <option value="" disabled selected>Select</option>
                            @foreach($days as $key => $val)
                             <option value="{{$key}}" selected="{{($key == $branch->to_day) ? true :''}}">{{$val}}</option>
                            @endforeach
                      </select>
                      <label>To Day*</label>
                    </div>
                    
                    
                    <div class="input-field col s12 m6 l6">
                        <input id="time" name="to_time" type="text" class="datepicker" readonly="true" value="{{isset($branch->to_time) ? $branch->to_time : ''}}">
                      <label for="time"  data-error="wrong" data-success="right">To Time*</label>
                    </div>
                    
                </div>
                <button class="btn all-btn" type="submit">Done</button>
            </form>
        </div>
        
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
jQuery(document).ready(function($){
   $('.datepicker').bootstrapMaterialDatePicker({ date: false, format : 'HH:mm' });
});
</script>
@endsection