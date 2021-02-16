@extends('backend.layout')
@section('content')
<div class="row">
    
    <div class="info_head">
        <span><a href="{{url('/profile')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Social</h4>
        </span>
    </div>
    <div class="row">
        <form class="col s12 all_form" action="" method="post" role ='form'>
            {!! csrf_field() !!}
        <div class="input-field col s12 l4">
          <input id="Facebook" type="text" class="validate" name="facebook_id" value="{{ $meta->facebook_id }}">
          <label for="Facebook">Facebook</label>
        </div>

        <div class="input-field col s12 l4">
          <input id="Linked" type="text" class="validate" name="linked_id" value="{{ $meta->linked_id }}">
          <label for="Linked">Linked In</label>
        </div>

        <div class="input-field col s12 l4">
          <input id="Google+" type="text" class="validate" name="google_id" value="{{ $meta->google_id }}">
          <label for="Google+">Google+</label>
        </div>
        <div class="input-field col s12 l4">
          <input id="SkypeID" type="text" class="validate" name="skype_id" value="{{ $meta->skype_id }}">
          <label for="SkypeID">Skype ID*</label>
        </div>
   
    <button class="btn all-btn" type="submit">Done</button>
    </form>
         </div>
</div>
@endsection