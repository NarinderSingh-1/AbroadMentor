<!-- Service -->
<form class="col s12 all_form" id="service" action="#" method="post">
    <div class="row">
        <div class="col s12">
            @if(!empty($mappedService))
                @if(isset($mappedService['other']))
                <div class="row">
                    <div class="check">
                        <p class="form_txt">Major services we direct deal in</p>
                        @foreach($mappedService['major'] as $serviceId)
                        <div class="col s12 m6 l3">
                            <input type="checkbox" class="filled-in" id="serv{{ $serviceId }}" disabled checked>
                            <label for="serv{{ $serviceId }}">{{ isset($serviceList[$serviceId]) ? $serviceList[$serviceId]['name'] : '' }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <div class="row">
                    <div class="check">
                        @if(!empty($mappedOther) || !empty($mappedService['other']))
                            <p class="form_txt">Other services we direct deal in</p>
                        @endif
                        
                        @if(isset($mappedService['other']))
                        @foreach($mappedService['other'] as $serviceId)
                        <div class="col s12 m6 l3">
                            <input type="checkbox" class="filled-in" id="serv{{ $serviceId }}" disabled checked>
                            <label for="serv{{ $serviceId }}">{{ isset($serviceList[$serviceId]) ? $serviceList[$serviceId]['name'] : '' }}</label>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            @endif
            
            @if(!empty($mappedOther))
            <div class="row">
                <div class="check">
                    @foreach($mappedOther as $other)
                    <div class="col s12 m6 l3">
                        <input type="checkbox" class="filled-in" id="serv{{ $other['value'] }}" disabled checked>
                        <label for="serv{{ $other['value'] }}">{{ $other['value'] }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</form>
<!-- service -->