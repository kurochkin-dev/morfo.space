<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.view', ['entities' => User::get()]);
    }

    public function edit(User $id)
    {
        return view('admin.users.edit', ['entity' => $id, 'roles' => UserGroup::get()]);
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update($request->only(['name', 'user_name', 'user_surname', 'user_patronymic', 'group_id']));
        return redirect()->back();
    }
}
