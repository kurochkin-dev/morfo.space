<?php

namespace App\Http\Controllers;

use App\Models\Registers\MedicalCenter;
use App\Models\Registers\ResearchType;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        return view('admin.researches.view', ['entities' => ResearchType::get()]);
    }

    public function form()
    {
        return view('admin.researches.create', ['centers' => MedicalCenter::get()]);
    }

    public function edit(ResearchType $id)
    {
        return view('admin.researches.edit', ['entity' => $id, 'centers' => MedicalCenter::get()]);
    }

    public function update(Request $request, $id)
    {
        ResearchType::where('id', $id)->update($request->only(['name', 'medical_center', 'price', 'medical_id']));
        return redirect()->back();
    }

    public function store(Request $request)
    {
        ResearchType::create($request->only(['name', 'medical_center', 'price', 'medical_id']));
        return redirect()->back();
    }
}