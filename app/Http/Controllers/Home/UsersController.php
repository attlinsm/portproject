<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UpdateRoleUserRequest;
use App\Models\Role;
use App\Models\User;


class UsersController extends Controller
{
    public function allUsers()
    {
        $users = User::query()->get()->all();
        return view('admin.users.users_all', compact('users'));
    }

    public function editUsers($id)
    {
        $user = User::query()->findOrFail($id);
        $roles = Role::query()->get()->all();
        return view('admin.users.users_edit', compact('user', 'roles'));
    }

    public function deleteUsers($id)
    {
        $user = User::query()->findOrFail($id);

        if($user->profile_image != null) {
            $user_image = $user->profile_image;
            unlink($user_image);
        }

        User::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'user-deleted');
    }

    public function updateUsers(UpdateRoleUserRequest $request, $id)
    {
        $validated = $request->validated();

        $user = User::query()->findOrFail($id);

        if (isset($validated['profile_image'])) {

            $file = $validated['profile_image'];
            $filename = 'avatar_' . $id;

            $file->move(public_path('upload/admin_images'), $filename);
            $validated['profile_image'] = $filename;

            $user->update([
                'profile_image' => $validated['profile_image']
            ]);
        }
        $user->role()->sync([$validated['role']]);

        return redirect()->route('users.all')->with('status', 'user-updated');
    }
}
