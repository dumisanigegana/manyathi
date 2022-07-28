<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Country;
// use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
        ]);

        $len = Str::length($request['cell']);
        $cell = Str::substr($request['cell'], 1, $len - 1);
         
        $user = User::create([
            'fname'     => $request['fname'],
            'mnames'     => $request['mnames'],
            'lname'     => $request['lname'],
            'username'    => $this->account($user->id),
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $subscriber = Subscriber::create([
            'dob'     => $request['dob'],
            'identity'     => $request['identity'],
            'gender'     => $request['gender'],
            'country'    => $request['country'],
            'city'    => $request['city'],
            'address'    => $request['address'],
            'country'    => $request['country'],
            'cell'    => $request['cell_country'] . $cell,
            'user_id'    => $user->id
        ]);

        Alert::success('Submited', 'Your profile has been created. To proceed, follow the instructions sent to '. $request['email'])->showConfirmButton('Ok', '#00FA9A');
        return redirect()->route('login');
    }

    
    public function account($uid)
    {        
      $id = $uid;
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
        return Subscriber::where('account', $acc)->exists();
    }

}
