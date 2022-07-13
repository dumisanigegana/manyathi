<?php

namespace App\Http\Livewire\Front;
use LivewireUI\Modal\ModalComponent;
use App\Models\Subscriber;
use App\Models\User;
use Auth;

//use Livewire\Component;

class EditProfile extends ModalComponent
{
    public $subscriber;

    public function mount()
    {        
        $this->subscriber = Auth::user()->subscriber;
    }

    public function render()
    { 
        return view('livewire.front.edit-profile');
    }

    public function update()
    {
        
        $this->closeModal();
    }
}
