<?php

namespace App\Http\Controllers;

use App\Models\Registers\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('admin.colors.view', ['entities' => Color::get()]);
    }

    public function form()
    {
        return view('admin.colors.create');
    }

    public function edit(Color $id)
    {
        return view('admin.colors.edit', ['entity' => $id]);
    }

    public function update(Request $request, $id)
    {
        Color::where('id', $id)->update($request->only(['name']));
        return redirect()->back();
    }

    public function store(Request $request)
    {
        Color::create($request->only(['name']));
        return redirect()->back();
    }
}