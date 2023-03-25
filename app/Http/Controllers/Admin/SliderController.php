<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');

    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'Description' => 'required|string|max:800',
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,svg,jpeg'
        ]);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validate['image'] = "uploads/slider/$filename";
        }
        
        $validate['status'] = $request->status ==true ? '1':'0';
        
        Slider::create($validate);

        return redirect('/admin/slider')->with('message', 'Slider Added Successfully');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    public function update( $slider_id, Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'Description' => 'required|string|max:800',
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,svg,jpeg' ?? $slider_id->image,
        ]);
        $slider = Slider::findOrFail($slider_id);
        if($request->hasFile('image')){
            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validate['image'] = "uploads/slider/$filename";
        }
        
        $validate['status'] = $request->status ==true ? '1':'0';
        
        Slider::where('id',$slider_id)->update($validate);

        return redirect('/admin/slider')->with('message', 'Slider updated Successfully');
    }

    public function delete(Slider $slider_id)
    {
        if($slider_id->count()>0){
            $destination = $slider_id->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $slider_id->delete();
            return redirect('/admin/slider')->with('message', 'Slider Deleted Successfully');
        }
        return redirect('/admin/slider')->with('message', 'Something Went Worng');

    }
}
