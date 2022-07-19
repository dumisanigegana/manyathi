<?php

namespace App\Http\Livewire\Front;
use App\Http\Livewire\Modal;
use App\Models\Subscriber;
use App\Models\User;
use Auth;

//use Livewire\Component;

class EditProfile extends Modal
{
    public $subscriber, $countries;

    public function mount()
    {        
        $this->subscriber = Auth::user()->subscriber;
        $this->countries = Country::pluck('nicename');
    }

    public function render()
    { 
        return view('livewire.front.edit-profile');
    }

    public function update()
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|min:3|max:255',
            'lname' => 'required|min:3|max:255',
            'birth' => 'required|date',
            'gender' => 'required|min:4|max:6',
            'country' => 'required|min:3|max:255',
            'city' => 'required|max:255',
            'address' => 'required|min:6|max:255',
            'cell' => 'required|min:5|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            //return back()->withErrorMessage($errors);;
        } else {    
            Alert::success('Submited', 'Profile updated');
            return redirect()->action([DashboardController::class, 'index']);
            $this->closeModal();
        }
    }
    
}
