<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {   
        $data = $request->all();
        $validator = Validator::make($data, [
            'first_name' => 'required|min:2|string|max:255',
            'last_name' => 'required|min:2|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' =>'required|min:10|numeric',
            'register_type' => 'required'
        ]);
        
        if ($validator->fails()) { 
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }

        try {
            $user = new User();
            $user->first_name =  $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = \Hash::make($data['password']);
            $user->status = 1;
            $user->is_member = $data['register_type'];
            $user->save();
            
            $userMeta = new UserMeta();
            $userMeta->user_id = $user->id;
            $userMeta->phone = $data['phone'];
            $userMeta->save();
            
             return redirect('/login#register')->with(alert('success','Account registered successfully. Please verify email'));
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

//        \Mail::send(['html' => 'emails.register'], [
//            'url' => url("set-password/123"),
//            'email' => 'rex.sateesh@gmail.com'
//                ], function ($mail) {
//            $mail->from('rex.sateesh@gmail.com', env('APP_NAME'));
//            $mail->to('rex.sateesh@gmail.com');
//            $mail->subject('welcome');
//        });
        
    }
}
