<div class="row">
    <form action='agency/description' class='col l12' method='post'>
        {!! csrf_field() !!}
        <div class="row">
            <div class="input-field col s9">
                <textarea id="textarea1" class="materialize-textarea" name="description" data-length="255"></textarea>
                <label for="textarea1">Description</label>
            </div>
            
            <div class="col s3" style="margin-top: 60px;">
                <input type="submit" value="Save" class="btn btn-lg btn-success btn-style-filled"/>
            </div>  
        </div>    
    </form>

    <form action='agency/timing' class='col l12' method='post' role='form'>
        {!! csrf_field() !!}
        <div class="row">
            <div class="col s3">
                <div class="input-field">
                    <select name="days">
                        <option value="" disabled selected>Choose days</option>
                        @if(!empty($days))
                            @foreach($days as $id => $day)
                                <option value="{{ $id }}">{{ $day }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label>Days</label>
                </div>
            </div>

            <div class="input-field col s3">
                <i class="material-icons prefix">alarm</i>
                <input readonly="true" type="text" name="open_time" class="validate timepicker">
                <label for="icon_prefix">Open Time</label>
            </div>

            <div class="input-field col s3">
                <i class="material-icons prefix">alarm</i>
                <input readonly="true" type="text" name="close_time" class="validate timepicker">
                <label for="icon_telephone">Close Time</label>
            </div>

            <div class="col s3" style="margin-top: 25px;">
                <input type="submit" value="Save" class="btn btn-lg btn-success btn-style-filled"/>
            </div>
        </div>    
    </form>
</div>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('select').material_select();
        $('.timepicker').pickatime({
            default: 'now', // Set default time: 'now', '1:30AM', '16:30'
            fromnow: 0, // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'OK', // text for done-button
            cleartext: 'Clear', // text for clear-button
            canceltext: 'Cancel', // Text for cancel-button
            autoclose: false, // automatic close timepicker
            ampmclickable: true, // make AM PM clickable
            aftershow: function () {} //Function for after opening timepicker
        });

    });
</script>
