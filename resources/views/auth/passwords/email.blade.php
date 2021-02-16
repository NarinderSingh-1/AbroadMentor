@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s4 offset-s4">
            <form method="POST" action="{{ route('password.email') }}">
                <div class="card" style="margin-top: 90px;padding: 15px 30px 10px 30px; float:left;">
                    <span class="card-title">Reset Password</span>
                    {{ csrf_field() }}

                    <div class="input-field col s12">
                        <input id="email" type="text" class="validate" name="email">
                        <label for="email">Email Address</label>
                    </div>

                    <div class="col s12">
                        <button type="submit" class="btn blue darken-3 pull-right">Reset</button>
                    </div>
                </div>
                
                <div class="col s12" style="text-align: center;">
                    <div style="margin-top: 30px;">
                        <a href="{{ url('login') }}" class="btn light-blue darken-3">Back to login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
