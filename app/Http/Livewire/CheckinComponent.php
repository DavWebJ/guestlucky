<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;

class CheckinComponent extends Component
{
    public $sorting;

    public function mount()
    {
        
       
        $this->sorting = "all";

    }

    public function render()
    {

        $today = Carbon::now()->format('Y-m-d');
        $tomorrow_add1 = Carbon::tomorrow()->addDay()->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $bookings = Booking::with('messages','property')->get();
        $checkouts = Booking::with('messages','property')->get();
   
        if($this->sorting == 'j+1')
        {

            $bookings = Booking::with('messages','property')->where('arrival',$tomorrow)->get();
            $checkouts = Booking::with('messages','property')->where('departure',$tomorrow)->get();
        }
        else if($this->sorting == 'j+2')
        {

            $bookings = Booking::with('messages','property')->where('arrival',$tomorrow_add1)->get();
            $checkouts = Booking::with('messages','property')->where('departure',$tomorrow_add1)->get();
        }        
        else if($this->sorting == 'j-1')
        {

            $bookings = Booking::with('messages','property')->where('arrival',$yesterday)->get();
            $checkouts = Booking::with('messages','property')->where('departure',$yesterday)->get();
        }
        else if($this->sorting == 'today')
        {

            $bookings = Booking::with('messages','property')->where('arrival',$today)->get();
            $checkouts = Booking::with('messages','property')->where('departure',$today)->get();
        }
        else if($this->sorting == 'all')
        {

            $bookings = Booking::with('messages','property')->get();
            $checkouts = Booking::with('messages','property')->get();
        }                
        else
        {
            
           $bookings = Booking::with('messages','property')->get();
           $checkouts = Booking::with('messages','property')->get();
        }
        return view('livewire.checkin-component',compact('bookings','checkouts'));
    }
}
