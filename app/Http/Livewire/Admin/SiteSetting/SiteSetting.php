<?php

namespace App\Http\Livewire\Admin\SiteSetting;

use App\Models\Setting;
use Livewire\Component;

class SiteSetting extends Component
{

    public function store()
    {
        $setting = Setting::first();
        if($setting)
        {

        }
        else
        {
            
        }
    }


    public function render()
    {
        return view('livewire.admin.site-setting.site-setting');
    }
}
