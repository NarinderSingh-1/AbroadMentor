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
        <div class="input-field col s12 l6">
          <input id="Facebook" type="text" class="validate" name="facebook_id" value="{{ $meta->facebook_id }}">
          <label for="Facebook">Facebook</label>
        </div>

        <div class="input-field col s12 l6">
          <input id="Linked" type="text" class="validate" name="youtube" value="{{ $meta->you_tube }}">
          <label for="Linked">Youtube</label>
        </div>

        <div class="input-field col s12 l6">
          <input id="insta+" type="text" class="validate" name="insta" value="{{ $meta->insta }}">
          <label for="insta+">Insta</label>
        </div>
        <div class="input-field col s12 l6">
          <input id="twitter" type="text" class="validate" name="twitter" value="{{ $meta->twitter }}">
          <label for="twitter">Twitter*</label>
        </div>
        
        <div class="input-field col s12 l6">
          <input id="Google+" type="text" class="validate" name="google_id" value="{{ $meta->google_id }}">
          <label for="Google+">Google+</label>
        </div>
        <div class="input-field col s12 l6">
          <input id="SkypeID" type="text" class="validate" name="skype_id" value="{{ $meta->skype_id }}">
          <label for="SkypeID">Skype ID*</label>
        </div>    
            
   
    <button class="btn all-btn" type="submit">Done</button>
    </form>
         </div>
</div>
@endsection