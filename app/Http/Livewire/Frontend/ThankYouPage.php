<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ThankYouPage extends Component
{
    public $session_id;
    protected $queryString = ['session_id'];
   

    public function render()
    {
        dd($this->session_id);
        return view('livewire.frontend.thank-you-page');
    }
}
