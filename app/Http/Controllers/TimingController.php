<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timing;
use Validator;

class TimingController extends Controller
{
    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
                    'open_time' => 'required',
                    'close_time' => 'required',
                    'days' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }
        try {
            $timing = new Timing();
            $timing->open_time =  $request->input('open_time');
            $timing->close_time = $request->input('close_time');
            $timing->days_id = $request->input('days');
            $timing->agency_id = currentUser()->id;
            $timing->save();
        } catch (\Exception $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return redirect('agency')->with(alert('success','Timming added successfully'));
    }
}
