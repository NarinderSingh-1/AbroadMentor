@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/profile')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>Institute Logo</h4>
            <p>Please upload a good quality picture of your institute with logo.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row">
            <form class="col s12 all_form" action="/profile/logo" enctype="multipart/form-data" method="post">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col s12">
                        <p class="center-align" style="font-size:12px;">Having a logo increases your chances of getting hired 10 times. Upload a high-quality logo now.</p>
                    </div>
                    <div class="col s4 offset-s4">
                        <div id="dvPreview">
                            <img src="/images/file_img.png" class="file_img"/>
                        </div>
                        <div class="upload-btn-wrapper">
                          <button class="btn file_btn">Choose a file</button>
                          <input type="file" name="logo" id="fileupload" />
                        </div>
                    </div>
                    <div class="col s12">
                        <p class="center-align" style="font-size:12px;">Photo format supported .jpeg .png .gif .bmp & Maximum size 10MB</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content_box">&nbsp;</div>
                    <div class="col s4 offset-s4">
                        <p class="pageContentTitle">Other benefits of having a great profile picture:</p>
                        <ul class="bullet">
                            <li>Makes your Institute look more credible.</li>
                            <li>Students prefer & trust Institutes with logo.</li>
                            <li>Boosts your ProScore that improves your ranking.</li>
                            <li>Increases your brand retention among students.</li>
                        </ul>
                    </div>
                    <div class="col s4 offset-s4 center-align">
                        <input type="submit" class="btn all-btn light-blue lighten-2 center-align" value="Upload Logo" style="margin-top: 20px;" />
                    </div>
                </div>	
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script language="javascript" type="text/javascript">
jQuery(document).ready(function ($) {
    $("#fileupload").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                        $("#dvPreview img").attr("class", "file_img");
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
});
</script>
@endsection