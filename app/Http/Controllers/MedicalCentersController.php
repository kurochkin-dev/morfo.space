<?php

namespace App\Http\Controllers;

use App\Models\Registers\MedicalCenter;
use Illuminate\Http\Request;

class MedicalCentersController extends Controller
{
    public function index()
    {
        return view('admin.medical_centers.view', ['entities' => MedicalCenter::get()]);
    }

    public function form()
    {
        return view('admin.medical_centers.create');
    }

    public function edit(MedicalCenter $id)
    {
        return view('admin.medical_centers.edit', ['entity' => $id]);
    }

    public function update(Request $request, $id)
    {
        MedicalCenter::where('id', $id)->update($request->only(['name', 'uniq_id', 'email', 'contract']));
        return redirect()->back();
    }

    public function store(Request $request)
    {
        MedicalCenter::create($request->only(['name', 'uniq_id', 'email', 'contract']));
        return redirect()->back();
    }
}