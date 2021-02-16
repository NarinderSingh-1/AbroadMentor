@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{ url('profile') }}"><i class="material-icons">arrow_back</i></a></span>
        <span style="width: 96%; position: relative;">
            <h4>{{ $tabTitle }}</h4>
            <p>Manage Information related to all of your {{ strtolower($tabTitle) }} here.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row padtp40">
            <div class="col s12">
                <ul class="tabs list-tab">
                    <li class="tab"><a class="{{ $tabType == 'service' ? 'active' : '' }}" href="{{ url('service') }}" target="_self">Service</a></li>
                    <li class="tab"><a class="{{ $tabType == 'tieups' ? 'active' : '' }}" href="{{ url('tieups') }}" target="_self">Tieups</a></li>
                    <li class="tab"><a class="{{ $tabType == 'article' ? 'active' : '' }}" href="{{ url('article') }}" target="_self">Articles</a></li>
                </ul>
            </div>

            @if($editAction)
                @include('backend.service.edit.' . $tabType)
            @else
            <div style="position: relative;">
                <a class="btn-floating waves-effect waves-light teal" style="position: absolute; top: 4px; right: 20px;" href="/{{ $tabType }}/edit"><i style="border: none; color: #fff;" class="material-icons">edit</i></a>
                @include('backend.service.view.' . $tabType)
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer')
<link href="{{ asset('js/selectaction/selectaction.css') }}" rel="stylesheet" />
<script src="{{ asset('js/selectaction/selectaction.js') }}"></script>
<style type="text/css">
    .other .input-field a{position: absolute; top: 0; right: 0; display: none;}
    .add_service_con .other .input-field a{display: block;}
    .add_service_con .other:first-child .input-field a{display: none;}

    .add_certified_con .other .input-field a{display: block;}
    .add_certified_con .other:first-child .input-field a{display: none;}

    .tie_con .college .input-field a{display: block;}
    .tie_con .college:first-child .input-field a{display: none;}
</style>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $("#addservice").click(function () {
            var addMore = $(".other", $(this).parent()).html();
            $(".add_service_con").append("<div class='col s12 other'>" + addMore + "</div>");
            $(".add_service_con .other:last input").val("");
            Materialize.updateTextFields();
        });

        $(document).on("click", ".removeField,.removeField i", function() {
            $(this).closest(".other").remove();
        });

        $("#addcretified").click(function () {
            var addMore = $(".other", $(this).parent()).html();
            $(".add_certified_con").append("<div class='col s12 other'>" + addMore + "</div>");
            $(".add_certified_con .other:last input").val("");
            Materialize.updateTextFields();
        });

        $(document).on("click", ".removeTieupField,.removeTieupField i", function() {
            $(this).closest(".other").remove();
        });

        $("#add_tieup").click(function () {
            var addMore = $(".college", $(this).parent()).html();
            $(".tie_con").append("<div class='college'>" + addMore + "</div>");
            $(".tie_con .college:last input").val("");
            Materialize.updateTextFields();
            $('select').material_select();
        });

        $(document).on("click", ".removeTieupCollege,.removeTieupCollege i", function() {
            $(this).closest(".college").remove();
        });
    });
</script>
@endsection
