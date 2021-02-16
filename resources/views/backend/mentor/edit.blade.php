@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/mentor')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Mentors</h4>
            <p>manage Information related to all of your branches here.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row padtp40">
            <form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input id="id" type="hidden" class="validate" name="id" value="{{$mentor['id']}}">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="First_Name" type="text" class="validate" name="first_name" value="{{$mentor['first_name']}}">
                        <label for="first_name"  data-error="wrong" data-success="right">First Name</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="Last_name" type="text" class="validate" name="last_name"  value="{{$mentor['last_name']}}">
                        <label for="last_name" data-error="wrong" data-success="right">Last Name</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" name="about"> {{$mentor['about']}}</textarea>
                        <label for="textarea1">About Me</label>
                    </div>

                    <div class="input-field col s6">
                        <select name="qualification">
                            <option value="" disabled selected>Qualification</option>
                            <option value="diploma" {{($mentor['qualification'] == "diploma") ? "selected" : ""}}>Diploma</option>
                            <option value="bachelor" {{($mentor['qualification'] == "bachelor") ? "selected" : ""}}>Bachelor</option>
                            <option value="master" {{($mentor['qualification'] == "master") ? "selected" : ""}}>Master</option>
                            <option value="phd" {{($mentor['qualification'] == "phd") ? "selected" : ""}}>P.hd</option>
                        </select>
                    </div>

                    <div class="input-field col s6">
                        <select name="experience">
                            <option value="" disabled selected>Experience</option>
                            <option value="one or less" {{($mentor['experience'] == "one or less") ? "selected" : ""}}>One or Less Years</option>
                            <option value="2-3" {{($mentor['experience'] == "2-3") ? "selected" : ""}}>2-3 Years</option>
                            <option value="3-5" {{($mentor['experience'] == "3-5") ? "selected" : ""}}>3-5 Years</option>
                            <option value="6-8" {{($mentor['experience'] == "6-8") ? "selected" : ""}}>6-8 Years</option>
                            <option value="9-13" {{($mentor['experience'] == "9-13") ? "selected" : ""}}>9-13 Years</option>
                            <option value="14-20" {{($mentor['experience'] == "14-20") ? "selected" : ""}}>14-20 Years</option>
                            <option value="21-30" {{($mentor['experience'] == "21-30") ? "selected" : ""}}>21-30 Years</option>
                            <option value="31-40" {{($mentor['experience'] == "31-40") ? "selected" : ""}}>31-40 Years</option>

                        </select>
                    </div>

                    <div class="col s12 m12 l12">
                        <p class="form_txt">Expert In</p>
                        
                            @foreach($services as $id=>$name)
                            <div class="col s12 m3 l4">
                                <input type="checkbox" name="services[]" class="filled-in" {{(in_array($name,$mentorServices)) ? 'checked' : ""}} id="services{{$id}}" value="{{$id}}">
                                <label for="services{{$id}}">{{$name}}</label>
                            </div>
                      
                        @endforeach
                    </div>

                     <div class="col s12 m12 l12">
                        <p class="form_txt">Certified From</p>
                        <div class="row check">
                            @foreach($skills as $id=>$name)
                            <div class="col s12 m3 l3">
                                <input type="checkbox" name="skill[]" class="filled-in" {{(in_array($name,$mentorMembership)) ? 'checked' : ""}} id="Experience{{$id}}" value="{{$id}}">
                                <label for="Experience{{$id}}">{{$name}}</label>
                            </div>
                            @endforeach
                            @if(!empty($otherMembership))
                            @foreach($otherMembership as $other)
                            <div class="col s12 other">
                                <div class="input-field">
                                    <input type="text" class="validate" name="others[]" value="{{ $other['value'] }}">
                                    <label for="other" data-error="wrong" data-success="right" >Other</label>
                                    <a class="btn-floating waves-effect waves-light red removeOtherField" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                                </div>

                                <div class="add_certified_con"></div>
                            </div>
                            @endforeach
                            @else
                            <div class="col s12 other">
                                <div class="input-field">
                                    <input type="text" class="validate" name="others[]">
                                    <label for="other" data-error="wrong" data-success="right">Other</label>
                                    <a class="btn-floating waves-effect waves-light red removeOtherField" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                                </div>

                                <div class="add_certified_con"></div>
                            </div>
                            @endif
                            <a class="add_more col right" id="addcretified"><i class="material-icons add_box">add</i> Add more</a>
                        
                        </div>

                    </div>

                    <div class="input-field col s6">
                        <input id="Last_name" type="text" class="validate" name="designation" value="{{$mentor['designation']}}">
                        <label for="designation" data-error="wrong" data-success="right">Designation</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="contact" type="number" class="validate" name="phone" value="{{$mentor['phone']}}">
                        <label for="phone" data-error="wrong" data-success="right">Contact No.</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="email" type="text" class="validate" name="email" value="{{$mentor['email']}}">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="fburl" type="text" class="validate" name="facebook_url" value="{{$mentor['facebook_url']}}">
                        <label for="fburl" data-error="wrong" data-success="right">Facebook url</label>
                    </div>

                    <div class="input-field col s12 m6 l8">
                        <div class="file-field">
                            <div class="btn upload_photo">
                                <span>Browse Photo</span>
                                <input type="file" name="photo">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 text-center">
                    <button type="submit" class="btn all-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>    
@endsection
@section('footer')
<style type="text/css">
    .other .input-field a{position: absolute; top: 0; right: 0; display: none;}
    .other .input-field a{display: none;}
    .other .add_certified_con .input-field a{display: block;}
</style>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $(document).on("click",".add_more", function(){
            var other = $(".other div:first").html();
            $(".other .add_certified_con").append("<div class='input-field'>" + other + "</div>");
            $(".other .add_certified_con div:last input").val("");
            Materialize.updateTextFields();
        });

        $(document).on("click", ".removeOtherField,.removeOtherField i", function() {
            $(this).parent().parent().remove();
        });
    });
</script>
@endsection

