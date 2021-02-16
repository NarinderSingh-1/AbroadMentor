<!-- service -->
<form class="col s12 all_form serviceListForm" id="service" action="{{ url('service/save') }}" method="post">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col s12">
            <div class="row">
                <p class="form_txt">Major services (Direct deals in)</p>
                <hr/><br/>
                <div class="row">
                    <div class="subject-info-box-1 col s5">
                        <p class="form_txt">Available services</p>
                        <select multiple="multiple" class="browser-default select-init-sort">
                            @if(!empty($serviceList))
                            @foreach($serviceList as $list)
                                @if(empty($mappedService['major']) || !in_array($list['id'], $mappedService['major']))
                                <option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
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
                        <p class="form_txt">Selected services</p>
                        <select multiple="multiple" class="form-control browser-default select-init-sort service-selected" name="services[major][]">
                            @if(!empty($serviceList))
                            @foreach($serviceList as $list)
                                @if(!empty($mappedService['major']) && in_array($list['id'], $mappedService['major']))
                                <option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <br/><br/>
                <p class="form_txt">Other services</p>
                <hr/><br/>
                <div class="row">
                    <div class="subject-info-box-1 col s5">
                        <p class="form_txt">Available services</p>
                        <select multiple="multiple" class="browser-default select-init-sort">
                            @if(!empty($serviceList))
                            @foreach($serviceList as $list)
                                @if(empty($mappedService['other']) || !in_array($list['id'], $mappedService['other']))
                                <option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
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
                        <p class="form_txt">Selected services</p>
                        <select multiple="multiple" class="form-control select-init-sort browser-default service-selected" name="services[other][]">
                            @if(!empty($serviceList))
                            @foreach($serviceList as $list)
                                @if(!empty($mappedService['other']) && in_array($list['id'], $mappedService['other']))
                                <option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <br/>
                <div class="add_service_con">
                    @if(!empty($mappedOther))
                    @foreach($mappedOther as $other)
                    <div class="col s12 other">
                        <div class="input-field">
                            <input type="text" name="others[]" class="validate" value="{{ $other['value'] }}">
                            <label for="other">Other</label>
                            <a class="btn-floating waves-effect waves-light red removeField" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col s12 other">
                        <div class="input-field">
                            <input type="text" name="others[]" class="validate">
                            <label for="other">Other</label>
                            <a class="btn-floating waves-effect waves-light red removeField" href="javascript:void(0);"><i class="material-icons">clear</i></a>
                        </div>
                    </div>
                    @endif
                </div>

                <a class="add_more col right" id="addservice"><i class="material-icons add_box">add</i> Add Service</a>
            </div>
        </div>

        <div class="col s12 text-center">
            <input type="submit" class="btn all-btn" value="Save" />
        </div>
    </div>
</form>
<!-- service -->