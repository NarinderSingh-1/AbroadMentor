<!-- tieups -->
<form class="col s12 all_form serviceListForm" id="tieups" action="{{ url('tieups/save') }}" method="post">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col s12">

            <div class="row">
                    <div class="subject-info-box-1 col s5">
                        <p class="form_txt">Available countries</p>
                        <select multiple="multiple" class="browser-default select-init-sort">
                            @if(!empty($countries))
                            @foreach($countries as $country)
                                @if(!array_key_exists($country['id'], $tieupsCountries))
                                <option value="{{ $country['id'] }}">{{ $country['country_name'] }}</option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="subject-info-arrows text-center col s2">
                        <p class="form_txt">&nbsp;</p>
                        <button type="button" class="btnAllRight btn btn-large tooltipped" data-position="right" data-tooltip="Move all right to left"><i class="material-icons">arrow_forward</i></button><br />
                        <button type="button" class="btnRight btn btn-large tooltipped" data-position="right" data-tooltip="Move selected left to right"><i class="material-icons">chevron_right</i></button><br />
                        <button type="button" class="btnLeft btn btn-large tooltipped" data-position="left" data-tooltip="Move selected right to left"><i class="material-icons">chevron_left</i></button><br />
                        <button type="button" class="btnAllLeft btn btn-large tooltipped" data-position="left" data-tooltip="Move all right to left"><i class="material-icons">arrow_back</i></button>
                    </div>
                    <div class="subject-info-box-2 col s5">
                        <p class="form_txt">Selected countries</p>
                        <select multiple="multiple" class="browser-default select-init-sort service-selected" name="countries[]">
                            @if(!empty($countries))
                            @foreach($countries as $country)
                                @if(array_key_exists($country['id'], $tieupsCountries))
                                    <option value="{{ $country['id'] }}">{{ $country['country_name'] }}</option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

            <div class="row">
                <p class="form_txt">Other countries</p>
                <div class="check">
                    <div class="add_certified_con">
                        @if(!empty($tieupsOther))
                        @foreach($tieupsOther as $other)
                        <div class="col s12 other">
                            <div class="input-field">
                                <input id="other" type="text" class="validate" name="others[countries][]" value="{{ $other['value'] }}">
                                <label for="other">Other</label>
                                <a class="btn-floating waves-effect waves-light red removeTieupField" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col s12 other">
                            <div class="input-field">
                                <input id="other" type="text" class="validate" name="others[countries][]">
                                <label for="other">Other</label>
                                <a class="btn-floating waves-effect waves-light red removeTieupField" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <a class="add_more col right" id="addcretified"><i class="material-icons add_box">add</i> Add Country</a>
                </div>
            </div>

            <p class="form_txt">University | College | Institute We Direct Deal In</p>
            <div class="tie_con">
                @if(!empty($tieupsCollege))
                @foreach($tieupsCollege as $tieup)
                <div class="college">
                    <div class="input-field col s12 m5">
                        <input id="uni_name" type="text" class="validate" name="others[degree][college][]" value="{{ $tieup['university'] }}">
                        <label for="uni_name" class="">University | Collage | Institute</label>
                    </div>

                    <div class="input-field col s12 m5">
                        <select name="others[degree][country][]">
                            <option value="" disabled selected>Country</option>
                            @if(!empty($countries))
                            @foreach($countries as $country)
                            <option value="{{ $country['id'] }}" {{ $tieup['country_id'] == $country['id'] ? 'selected' : '' }}>{{ $country['country_name'] }}</option>
                            @endforeach
                            @endif
                        </select>
                        <label>Country</label>
                    </div>

                    <div class="input-field col s12 m1">
                        <a class="btn-floating waves-effect waves-light red removeTieupCollege" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="college">
                    <div class="input-field col s12 m5">
                        <input id="uni_name" type="text" class="validate" name="others[degree][college][]">
                        <label for="uni_name" class="">University | Collage | Institute</label>
                    </div>

                    <div class="input-field col s12 m5">
                        <select name="others[degree][country][]">
                            <option value="" disabled selected>Country</option>
                            @if(!empty($countries))
                            @foreach($countries as $country)
                            <option value="{{ $country['id'] }}">{{ $country['country_name'] }}</option>
                            @endforeach
                            @endif
                        </select>
                        <label>Country</label>
                    </div>

                    <div class="input-field col s12 m1">
                        <a class="btn-floating waves-effect waves-light red removeTieupCollege" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                    </div>
                </div>
                @endif
            </div>

            <a class="add_more col right" id="add_tieup"><i class="material-icons add_box">add</i> Add College</a>
        </div>

        <div class="col s12 text-center">
            <input type="submit" class="btn all-btn" value="Save" />
        </div>
    </div>
</form>
<!-- tieups -->