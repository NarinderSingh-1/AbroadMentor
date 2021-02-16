<!-- tieups -->
<form class="col s12 all_form" id="tieups">
    <div class="row">
        <div class="col s12">
            
            <div class="row">
                <p class="form_txt">Countries we direct deal in</p>
                <div class="check">
                    @if(!empty($tieups))
                    @foreach($tieups as $tieup)
                    @php
                    if(!empty($tieup['university'])) {
                    continue;
                    }
                    @endphp
                    <div class="col s12 m6 l3">
                        <input type="checkbox" class="filled-in" id="serv{{ $tieup['country_id'] }}" disabled checked>
                        <label for="serv{{ $tieup['country_id'] }}">{{ isset($countries[$tieup['country_id']]) ? $countries[$tieup['country_id']]['country_name'] : '' }}</label>
                    </div>
                    @endforeach
                    @endif

                    @if(!empty($tieupsOther))
                    @foreach($tieupsOther as $other)
                    <div class="col s12 m6 l3">
                        <input type="checkbox" class="filled-in" id="serv{{ $other['value'] }}" disabled checked>
                        <label for="serv{{ $other['value'] }}">{{ $other['value'] }}</label>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <p class="form_txt">University | College | Institute We Direct Deal In</p>
            <table class="striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                    </tr>
                </thead>

                <tbody>
                    @if(!empty($tieups))
                    @foreach($tieups as $tieup)
                    @php
                    if(empty($tieup['university'])) {
                    continue;
                    }
                    @endphp
                    <tr>
                        <td>{{ $tieup['university'] }}</td>
                        <td>{{ isset($countries[$tieup['country_id']]) ? $countries[$tieup['country_id']]['country_name'] : '' }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</form>
<!-- tieups -->