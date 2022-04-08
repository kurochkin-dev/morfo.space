<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    public function index()
    {
        return view('admin.user_groups.view', ['entities' => UserGroup::get()]);
    }

    public function form()
    {
        return view('admin.user_groups.create');
    }

    public function edit(UserGroup $id)
    {
        $id->statuses = json_decode($id->statuses);
        $id->fields = json_decode($id->fields);

        return view('admin.user_groups.edit', ['entity' => $id]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'fields' => json_encode(array_keys($request->fields)),
            'statuses' => json_encode(array_keys($request->statuses)),
        ];

        UserGroup::where('id', $id)->update($data);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'fields' => $request->fields ? json_encode(array_keys($request->fields)) : '[]',
            'statuses' => $request->statuses ? json_encode(array_keys($request->statuses)) : '[]',
        ];

        UserGroup::create($data);
        return redirect()->back();
    }
}