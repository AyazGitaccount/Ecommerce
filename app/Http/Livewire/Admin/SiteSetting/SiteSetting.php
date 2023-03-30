<?php

namespace App\Http\Livewire\Admin\SiteSetting;

use App\Models\Setting;
use Livewire\Component;

class SiteSetting extends Component
{
    public  $website_name, $webiste_url, $page_title, $meta_keyword,$meta_description;
    public $address,$phone1,$phone2,$email1, $email2,$facebook, $twitter, $instagram,$youtube; 
   
   
    public function store()
    {
        
        $setting = Setting::first();
        if($setting)
        {
            $setting->update([
                'website_name'=>$this->website_name,
                'webiste_url'=>$this->webiste_url,
                'page_title'=>$this->page_title,
                'meta_keyword'=>$this->meta_keyword,
                'meta_description'=>$this->meta_description,
                'address'=>$this->address,
                'phone1'=>$this->phone1,
                'phone2'=>$this->phone2,
                'email1'=>$this->email1,
                'email2'=>$this->email2,
                'facebook'=>$this->facebook,
                'twitter'=>$this->twitter,
                'instagram'=>$this->instagram,
                'youtube'=>$this->youtube  
            ]);
            
            return redirect()->back()->with('message',"Settings updated ");
            
        }
        else
        {
           
            Setting::create([
                'website_name'=>$this->website_name,
                'webiste_url'=>$this->webiste_url,
                'page_title'=>$this->page_title,
                'meta_keyword'=>$this->meta_keyword,
                'meta_description'=>$this->meta_description,
                'address'=>$this->address,
                'phone1'=>$this->phone1,
                'phone2'=>$this->phone2,
                'email1'=>$this->email1,
                'email2'=>$this->email2,
                'facebook'=>$this->facebook,
                'twitter'=>$this->twitter,
                'instagram'=>$this->instagram,
                'youtube'=>$this->youtube  
            ]);
            
            return redirect()->back()->with('message',"Settings created ");
            
        }
    }


    public function render()
    {
        $setting = Setting::first();
        
        foreach($setting->toArray() as $key => $value){
            $this->{$key} = $value;
        }

        return view('livewire.admin.site-setting.site-setting',compact('setting'));
    }
}
