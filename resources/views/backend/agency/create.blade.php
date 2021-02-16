@extends('layouts.backend')
@section('bodyClass', 'agency')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h3 class="display-5 text-center"> Enter your agency detail </h3>
            <h6 style="text-align: center;"> Please help us with the below information</h6>
            <form class="form-horizontal" method="POST" action="{{ url('agency') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col control-label">Name</label>
                            <div class="col">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('services') ? ' has-error' : '' }}">
                            <label for="services" class="col control-label">Services</label>
                            <div class="col">
                                <select name="service" id="service" class="form-control">
                                    <option value="" selected="" disabled="">Select</option>
                                    @if(!empty($serviceList))
                                    @foreach($serviceList as $service)
                                    <option value="{{ $service['id'] }}">{{ $service['name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('services'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('services') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col control-label">City</label>
                            <div class="col">
                                <input id="city" type="city" class="form-control" name="city" required>
                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


