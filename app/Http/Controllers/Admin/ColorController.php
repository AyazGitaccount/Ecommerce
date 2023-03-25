<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'nullable'
        ]);
        $validate['status'] = $request->status ==true ? '1':'0';
        Color::create($validate);

        return redirect('admin/colors')->with('message','color Added Successfully');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
        
    }

    public function update($color_id, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'nullable'
        ]);
        $validate['status'] = $request->status ==true ? '1':'0';
        Color::find($color_id)->update($validate);

        return redirect('admin/colors')->with('message','color updated Successfully');
    }

    public function delete_color( int $color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','color deleted Successfully');

    }
}
