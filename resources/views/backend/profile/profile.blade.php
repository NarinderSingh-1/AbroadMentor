@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <h4>Profile Information</h4>
        <p>Update your profile as it appears on Profile.</p>
    </div>
    <div class="col s12">
        <ul class="info-tab">
            <li>
                <a href="{{url('/profile/institute')}}">
                    <span class="icon"><img src="{{ asset('images/user-info.png') }}" /></span>
                    <span>
                        <h4>Institute Information</h4>
                        <small>
                            <span>{{$user->first_name . ' ' . $user->last_name}}</span>, <span>{{ $user->email }}</span> <span class="red-color">- Verification Pending</span>
                        </small>
                    </span>	
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>

            <li>
                <a href="{{('/profile/about')}}">
                    <span class="icon"><img src="{{ asset('images/about_ins.png') }}" /></span>
                    <span>
                        <h4>About the institute</h4>
                        @if(!empty($user->organisation->about_us))
                        <small class="green-color">{{ substr($user->organisation->about_us, 0, 50) }}</small>
                        @else
                        <small class="red-color">Not available</small>
                        @endif
                    </span>
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>

            <li>
                <a href="{{url('/profile/logo')}}">
                    <span class="icon"><img src="{{ asset('images/prologo.png') }}" /></span>
                    <span>
                        <h4>Logo</h4>
                        @if(!empty($user->organisation->logo_url))
                        <small class="green-color">{{ $user->organisation->logo_url }}</small>
                        @else
                        <small class="red-color">Not available</small>
                        @endif
                    </span>
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>

            <li>
                <a href="{{url('/profile/branch')}}">
                    <span class="icon"><img src="{{ asset('images/branch.png') }}" /></span>
                    <span>
                        <h4>Branches</h4>
                        <small class="green-color">lakshmi Nagar</small>
                    </span>
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>

            <li>
                <a href="{{url('/profile/gallery')}}" >
                    <span class="icon"><img src="{{ asset('images/gallery.png') }}" /></span>
                    <span>
                        <h4>Gallery</h4>
                        <small><span>0 Intro Videos</span> <span>0 Photos</span> <span>0 Videos</span> <span>0 Documents</span></small>
                    </span>
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>

            <li>
                <a href="{{url('/profile/social')}}">
                    <span class="icon"><img src="{{ asset('images/social_verification.png') }}" /></span>
                    <span>
                        <h4>Social</h4>
                        @if(!empty($user->meta->facebook_id)||!empty($user->meta->skype_id)||!empty($user->meta->google_id)||!empty($user->meta->linked_id))
                        <small class="green-color"> Verified</small>
                        @else
                        <small class="red-color">Not verified</small>
                        @endif
                    </span>
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>

            <li>
                <a href="#profileUrlModal" class="modal-trigger" style="border-bottom: none;">
                    <span class="icon"><img src="{{ asset('images/link.png') }}" /></span>
                    <span>
                        <h4>Customize Profile URL</h4>
                        @if(!empty($user->organisation->city))
                        <small class="grey-color">{{ url('v/' . $user->organisation->city->name) }}/<span id="profileSlug">{{ $user->organisation->url != '' ? trim($user->organisation->url) : 'profile-url' }}</span></small>
                        @else
                        <small class="red-color">Not available</small>
                        @endif
                    </span>
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>
        </ul>
    </div>
</div>

<div id="profileUrlModal" class="modal">
    <div class="modal-content">
        <h5 style="margin-top: 0;">Customize Profile URL</h5>
        <ul class="collection" style="margin: 0;">
            <li class="collection-item">
                <div class="row" style="margin: 0;">
                    <div class="input-field col s12">
                        <input id="profileUrl" type="text" class="validate" value="">
                        <label for="profileUrl">Profile Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input disabled value="{{ !empty($user->organisation->city) ? url('v/' . $user->organisation->city->name) . '/' : '' }}{{ !empty($user->organisation->url) ? trim($user->organisation->url) : '' }}" id="profileUrlDisabled" type="text" class="validate">
                        <label for="profileUrlDisabled">Profile URL</label>
                    </div>
                </div>
            </li>
        </ul>
        <a href="javascript:void(0);" class="waves-effect waves-green btn right" id="saveProfileUrl" style="margin: 15px 0;">Save</a>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var baseUrl = "{{ !empty($user->organisation->city) ? url('v/' . $user->organisation->city->name) . '/' : '' }}", 
        profileUrl = "{{ !empty($user->organisation->url) ? trim($user->organisation->url) : '' }}",
        urlEdited = false;

        $("#profileUrl").val(profileUrl);

        $(document).on("keyup blur", "#profileUrl", function () {
            urlEdited = true;
            var v = $(this).val();
            profileUrl = v.replace(/[^A-Za-z0-9-]+/g, "-").replace(/\-$/, "");
            $("#profileUrlDisabled").val(baseUrl + profileUrl);
        });

        $(document).on("click", "#saveProfileUrl", function(){
            if(urlEdited == false) {
                $("#profileUrlModal").modal().close();
                return false;
            }

            var inp = {org: {{ !empty($user->organisation->id) ? $user->organisation->id : 0}}, url: profileUrl, _token: "{{ csrf_token() }}"};
            $.ajax({
                type: "POST",
                url: "{{ url('profile/url') }}",
                dataType: "json",
                data: inp,
                beforeSend: function() {
                    Materialize.toast("Please wait...", 5000, "light-blue");
                }, error: function() {
                    Materialize.toast("Please try again later", 5000, "red darken-2");
                }, success: function(r) {
                    if(r.res) {
                        Materialize.toast("Profile URL changed", 5000, "green darken-2");
                        $("#profileSlug").text(profileUrl);
                        $("#profileUrlModal").modal().close();
                    } else {
                        Materialize.toast("Please try again later", 5000, "red darken-2");
                    }
                }
            });
        });
    });
</script>
@endsection	
