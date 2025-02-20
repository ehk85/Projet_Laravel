<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component {
    public $property_id, $start_date, $end_date;

    public function book() {
        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès !');
    }

    public function render() {
        return view('livewire.booking-manager', [
            'properties' => Property::all(),
        ]);
    }
}

