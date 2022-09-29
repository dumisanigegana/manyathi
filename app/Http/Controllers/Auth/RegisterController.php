<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Country;
use App\Models\Acheivement;
// use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Mail;
Use Alert;

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

    //use RegistersUsers;

    public function register()
    {
       $countries = Country::all();
       return view('auth.register', ['countries' => $countries]);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {         
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
            'fname' => 'required|min:3|max:255',
            'lname' => 'required|min:3|max:255',
            'email' => 'required|email',
            'dob' => 'required|date',
            'identity' => 'required|min:3|max:255',
            'gender' => 'required|min:4|max:6',
            'country' => 'required|min:3|max:255',
            'city' => 'required|max:255',
            'address' => 'required|min:6|max:255',
            'cell' => 'required|phone:cell_country,mobile',
            'cell_country ' => 'required_with:cell',
            'captcha'    => 'required|captcha',
        ]);

        $len = Str::length($request['cell']);
        $cell = Str::substr($request['cell'], 1, $len - 1);
        
        $last_user = User::latest()->first();
        $account = $this->account($last_user->id);
        $user = User::create([
            'fname'     => $request['fname'],
            'mnames'     => $request['mnames'],
            'lname'     => $request['lname'],
            'username'    => $this->account($last_user->id),
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $subscriber = Subscriber::create([
            'dob'           => $request['dob'],
            'identity'      => $request['identity'],
            'gender'        => $request['gender'],
            'country'       => $request['country'],
            'city'          => $request['city'],
            'address'       => $request['address'],
            'country'       => $request['country'],
            'cell'          => $request['cell_country'] . $cell,
            'user_id'       => $user->id,
            'subphase_id'   => 3
        ]);
        
        for($i=1;$i<3; $i++)
        {
           Acheivement::create([
            'subscriber_id'  =>     $subscriber->id,
            'subphase_id'    =>     $i,
            'status'         =>     "Completed"
           ]);
        }
        $message = "This is the message variable";

        if ($subscriber) {
            Mail::to($user->email)->send(new Subscribe($subscriber, $message));
            // return new JsonResponse(
            //     [
            //         'success' => true, 
            //         'message' => "Thank you for subscribing to our email, please check your inbox"
            //     ], 
            //     200
            // );
        }

        Alert::success('Submited', 'Your profile has been created. To proceed, follow the instructions sent to '. $request['email'])->showConfirmButton('Ok', '#00FA9A');
        return redirect()->route('login');
    }

    
    public function account($uid)
    {        
      $id = $uid + 1;
      $len = Str::length($id);
      $acc = Str::substr('1204302101', 0, 10-$len) . $id;            

        if($this->test($acc)) {
            $num = 1;
            for($i= 0; $i<$len; $i++) {
                $num = $num *=10;
            }
            $acc = $acc - $num;
        }

        return $acc;
    }

    public function test($acc)
    {
        return User::where('username', $acc)->exists();
    }

    
     // ================================================
    /* method : refreshCaptcha
    * @param  : 
    * @Description : return captcha code
    */// ==============================================
    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }

    // ================================================
    /* method : validateCapture
    * @param  : 
    * @Description : return captcha code
    */// ==============================================
    public function validateCapture(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'captcha'    => 'required|captcha',
        ]);
        //dd($validator->fails());
        if ($validator->fails()) {
            $valid = 'Invalid';
            $class = "text-red-500";            
        } else {
            $valid = 'Valid';
            $class = "text-green-500";
        }
        return response()->json(['valid' => $valid, 'class' => $class]);

    }
    

}
