@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/event')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Add Events</h4>
            <p>manage Information related to all of your branches here.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row padtp40">
            <form class="col s12 all_form" action="" method="post" role ='form' enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col s12">
                        <input id="event_name" type="text" class="validate" name="name">
                        <label for="event_name"  data-error="wrong" data-success="right">Event Name (maximum 200 characters)*</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="category" class="location" id="categoryAutoComplete" value="" autocomplete="off" />
                        <label for="event_categoty" data-error="wrong" data-success="right">Event Category*</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="event" class="materialize-textarea" name="introduction"></textarea>
                        <label for="event" class="">Event Introduction</label>
                    </div>
                      
                    <div class="tie_con">
                        <div class="collage">
                            <div class="input-field col s12 m6 l6">
                                <input id="uni_name" type="text" class="validate" name="others[degree][collage][]">
                                       <label for="uni_name" class="">University | Collage | Institute | Participate In</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <select name="others[degree][country][]">
                                    <option value="" disabled selected>Country</option>
                                    @if(!empty($countries))
                                    @foreach($countries as $key =>$country) 
                                    <option value="{{ $key }}">{{ $country }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="input-field col s12 m10">
                                <textarea id="textarea" class="materialize-textarea" data-length="1500" name="others[degree][description][]"></textarea>
                                       <label for="uni_name" class="">Description</label>
                            </div>

                            <div class="input-field col s12 m1">
                                <a class="btn-floating waves-effect waves-light red removeTieupCollage" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                            </div>
                            
                            
                        </div>
                    </div>  
                    <a class="add_more col right" id="add_tieup"><i class="material-icons add_box">add</i> Add More</a>


                    <div class="input-field col s12">
                        <input type="text" class="datepicker" name="date">
                        <label for="uni_name" class="">Event Date</label>
                    </div>

                    <div class="input-field col s12 m12 l6">
                        <input type="text" class="timepicker" name="start_time">
                        <label for="uni_name" class="">Event Start Time</label>
                    </div>

                    <div class="input-field col s12 m12 l6">
                        <input type="text" class="timepicker" name="end_time">
                        <label for="uni_name" class="">Event End Time</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="city" type="text" class="validate" name="city">
                        <label for="city"  data-error="wrong" data-success="right">City</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="hotel" type="text" class="validate" name="hotel">
                        <label for="hotel"  data-error="wrong" data-success="right">Hotel</label>
                    </div>

                </div>
                <button class="btn all-btn" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')

{!! getSearchData() !!}

<style type="text/css">
    .other .input-field a{position: absolute; top: 0; right: 0; display: none;}

    .tie_con .collage .input-field a{display: block;}
    .tie_con .collage:first-child .input-field a{display: none;}
</style>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.timepicker').bootstrapMaterialDatePicker({ date: false, format : 'HH:mm' });
        $('.datepicker').bootstrapMaterialDatePicker({ time: false, format : 'YYYY-MM-DD' });
        $("#add_tieup").click(function () {
            var addMore = $(".collage", $(this).parent()).html();
            $(".tie_con").append("<div class='collage'>" + addMore + "</div>");
            $(".tie_con .collage:last input").val("");
            Materialize.updateTextFields();
            $('select').material_select();
        });

        $(document).on("click", ".removeTieupCollage,.removeTieupCollage i", function () {
            $(this).closest(".collage").remove();
        });
    });
</script>

@endsection