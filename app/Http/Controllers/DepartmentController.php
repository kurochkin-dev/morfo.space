<?php

namespace App\Http\Controllers;

use App\Models\Registers\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.departments.view', ['entities' => Department::get()]);
    }

    public function form()
    {
        return view('admin.departments.create');
    }

    public function edit(Department $id)
    {
        return view('admin.departments.edit', ['entity' => $id]);
    }

    public function update(Request $request, $id)
    {
        Department::where('id', $id)->update($request->only(['name']));
        return redirect()->back();
    }

    public function store(Request $request)
    {
        Department::create($request->only(['name']));
        return redirect()->back();
    }
}