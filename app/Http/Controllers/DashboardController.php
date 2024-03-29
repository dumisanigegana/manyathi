<?php

namespace App\Http\Controllers;

use App\Models\User;  
use App\Models\Phase;  
use App\Models\Country;  
use App\Models\Subscriber; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use App\Mail\Book;
use App\Mail\Payment;
// use Illuminate\Validation\Validator;
Use Alert;
use Auth;

class DashboardController
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    public function index()
    {
        $subscriber = Auth::user()->subscriber;
        $countries = Country::pluck('nicename');
        $phase = Phase::find($subscriber->subphase->phase->id);
        return view('profile', ['subscriber' => $subscriber, 'countries' => $countries, 'phase' => $phase]);
    }

    public function edit()
    {
        $subscriber = Auth::user()->subscriber;        
        $countries = Country::pluck('nicename');
        return view('front.edit-profile', ['subscriber' => $subscriber, 'countries' => $countries]);
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'fname' => 'required|min:3|max:255',
            'lname' => 'required|min:3|max:255',
            'dob' => 'required|date',
            'gender' => 'required|min:4|max:6',
            'country' => 'required|min:3|max:255',
            'city' => 'required|max:255',
            'address' => 'required|min:6|max:255',
            'cell' => 'required|phone:cell_country,mobile',
            'cell_country ' => 'required_with:cell',
            'avatar' => 'file|mimes:jpg, png, jpeg, gif, svg|max:2048'
        ], 
        [
            'fname.required' => 'First name is required',
            'dob.required' => 'Date of birth is required',
            'fname.min' => 'First name is too short',
            'fname.max' => 'First name is too long',
            'lname.required' => 'Surname name is required',
            'lname.min' => 'Surname is too short',
            'lname.max' => 'Surname is too long',
            'avatar.mimes' => 'Image file format not support. Use png, jpg, gif or svg',
            'avatar.max' => 'Image file is too long',
        ]);

        if($request['avatar']) { 
            $file = $request->file('avatar');           
            $fileName = $file->hashName();
            $filePath =  $request->file('avatar')->storeAs('avatars', $fileName, 'public');
            $file_path = '/storage/' . $filePath;
            // dd($extension);

            Subscriber::findOrFail(Auth::user()->subscriber->id)
                        ->update(['avatar' => $file_path]);
        }
    
        $user = Auth::user();        
        // $user = User::findOrFail(Auth::user()->id);        
        $user->fname = $request['fname'];
        $user->mnames = $request['mnames'];
        $user->lname = $request['lname'];
            
        $user->save();
        

        $subscriber = Auth::user()->subscriber;
        // $subscriber = Subscriber::findOrFail(Auth::user()->subscriber->id);
        $subscriber->dob = $request['dob'];
        $subscriber->gender = $request['gender'];
        $subscriber->country = $request['country'];
        $subscriber->city = $request['city'];
        $subscriber->address = $request['address'];
        $subscriber->cell = $request['cell'];
        $subscriber->save();
    
        Alert::success('Submited', 'Profile updated')->showConfirmButton('Ok', '#00FA9A');
        return redirect()->action([DashboardController::class, 'index']);
        
    }

    public function pic(Request $request)
    {        
        $validate = ['jpg','png','jpeg','gif','svg'];
        $size = $request->file('avatar')->getSize();  

        if($request['avatar']) { 
            $file = $request->file('avatar'); 
            $name = $file->hashName(); // Generate a unique, random name...
            $extension = $file->extension(); // Determine the file's extension based on the file's MIME type...  
            if($size < 2048000) {
                if (in_array($extension, $validate)) {
                    $fileName = Auth::user()->subscriber->account . "." . $extension;
                    $filePath =  $request->file('avatar')->storeAs('avatars', $fileName, 'public');
                    $file_path = '/storage/' . $filePath;
                    Subscriber::findOrFail(Auth::user()->subscriber->id)
                            ->update(['avatar' => $file_path]);
                            Alert::success('Submited', 'Profile picture Changed');
                    return redirect()->back();
                } else {
                    Alert::error('Failed', 'You can only upload a svg, png, jpg or gif file.')->showConfirmButton('Ok', '#00FA9A');  
                    return back();                   
                }
            } else {
                Alert::error('Failed', 'You can only upload a file less than 2MB.')->showConfirmButton('Ok', '#00FA9A');   
                return back();              
            }            
        }       
        
    }

}
