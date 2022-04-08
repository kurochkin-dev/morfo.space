<?php

namespace App\Http\Controllers;

use App\Models\Registers\BodyPart;
use Illuminate\Http\Request;

class OrgansController extends Controller
{
    public function index()
    {
        return view('admin.body_parts.view', ['entities' => BodyPart::get()]);
    }

    public function form()
    {
        return view('admin.body_parts.create');
    }

    public function edit(BodyPart $id)
    {
        return view('admin.body_parts.edit', ['entity' => $id]);
    }

    public function update(Request $request, $id)
    {
        BodyPart::where('id', $id)->update($request->only(['name']));
        return redirect()->back();
    }

    public function store(Request $request)
    {
        BodyPart::create($request->only(['name']));
        return redirect()->back();
    }
}