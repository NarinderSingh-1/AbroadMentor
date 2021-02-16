@extends('backend.layout')
@section('content')
            <div class="row">
                <div class="info_head">
                    <span><a href="{{url('/promote/advertisement')}}"><i class="material-icons">arrow_back</i></a></span>
                    <span>
                        <h4>Promote</h4>
                        <p>manage Information related to all of your branches here.</p>
                    </span>
                </div>
                <div class="col s12">
                    <div class="row padtp40">

                        <!-- Advertise -->
                         <form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input id="id" type="hidden" class="validate" name="id" value="{{$advertisement['id']}}">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field col s6">
                                        <input id="company_name" type="text" class="validate" name="company_name" value="{{$advertisement['company_name']}}">
                                        <label for="company_name"  data-error="wrong" data-success="right">Company Name</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="city" type="text" class="validate" name="city" value="{{$advertisement['city']}}">
                                        <label for="city"  data-error="wrong" data-success="right">City</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="first_name" type="text" class="validate" name="first_name" value="{{$advertisement['first_name']}}">
                                        <label for="first_name"  data-error="wrong" data-success="right">First Name</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="last_name" type="text" class="validate" name="last_name" value="{{$advertisement['last_name']}}">
                                        <label for="last_name"  data-error="wrong" data-success="right">Last Name</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="mob_no" type="number" class="validate" name="mob_no" value="{{$advertisement['mobile']}}">
                                        <label for="mob_no"  data-error="wrong" data-success="right">Mobile No.</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="line_no" type="number" class="validate" name="line_no" value="{{$advertisement['phone']}}">
                                        <label for="line_no"  data-error="wrong" data-success="right">Landline No.</label>
                                    </div>

                                    <div class="col s12 text-center">
                                       <button type="submit" class="btn all-btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Advertise -->


                    </div>
                </div>
            </div>
        @endsection