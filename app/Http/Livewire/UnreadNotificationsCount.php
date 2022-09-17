<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UnreadNotificationsCount extends Component
{      
    public $unreadNotificationsCount;

    public function render()
    {   
        $userID = Auth::user()->id;
        
        $this->unreadNotificationsCount = $unreadNotificationsCount = Notification::where('technician_id', $userID)->where('status', 0)->count();

        return <<<'blade'
            <div>
                {{ $unreadNotificationsCount }}
            </div>
        blade;
    }
}
