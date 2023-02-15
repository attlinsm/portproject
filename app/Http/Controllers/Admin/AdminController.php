<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreProfileRequest;
use App\Http\Requests\Admin\AdminUpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'admin-logout');
    }

    public function profile()
    {
        $user = Auth::user();
        $role = $user->role;
        return view('admin.admin_profile_view', compact('user', 'role'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.admin_profile_edit', compact('user'));
    }

    public function store(AdminStoreProfileRequest $request)
    {

        $validated = $request->validated();

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = 'avatar_' . $request->user()->id;
            $file->move(storage_path('app/public/upload/admin_images'), $filename);

            $validated['profile_image'] = $filename;
        }

        $request->user()->fill($validated)->save();

        return redirect()->route('admin.profile')->with('status', 'profile-updated');
    }

    public function change()
    {
        return view('admin.admin_change_password');
    }

    public function update(AdminUpdatePasswordRequest $request)
    {
        $validated = $request->validated();

        if (Hash::check($request->oldpassword, $request->user()->password)) {

            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

        }
        return redirect()->back()->with('status', 'password-updated');
    }
}
