<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Messenger extends Component
{

    public function render()
    {
        $messages = Message::with('property','booking')->orderBy('time', 'desc')
        ->where('user_id',auth()->user()->id)
        ->get();
        return view('livewire.messenger',compact('messages'));
    }
}
