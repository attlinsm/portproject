<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function destroy(Request $request): object
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = [
            'message' => 'User logout successfully',
            'alert-type' => 'success'
        ];

        return redirect('/login')->with($notification);
    }


    public function Profile(): object
    {
        $user = Auth::user();
        return view('admin.admin_profile_view', compact('user'));
    }


    public function EditProfile(): object
    {
        $userData = Auth::user();
        return view('admin.admin_profile_edit', compact('userData'));
    }

    public function StoreProfile(Request $request, $id): object
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ], [
            'name.required' => 'If you want change your user name you need to fill this field with new one.',
            'email.required' => 'New email is missing',
        ]);

        $data = User::query()->find($id);

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            unlink(public_path('upload/admin_images/' . $data->profile_image));

            $filename = date('d_m_Y_H-i') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);

            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_image' => $filename,
                'updated_at' => Carbon::now('GMT+3'),
            ]);
        }

        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now('GMT+3'),
        ]);

        $notification = [
            'message' => 'Admin profile updated',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword(): object
    {
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request): object
    {
        $request->validate([
            'oldpassword' => 'required|max:255',
            'newpassword' => 'required|max:255',
            'confirm_password' => 'required|same:newpassword',
        ], [
            'oldpassword.required' => 'Need to write your current password',
            'newpassword.required' => 'Enter new password',
            'confirm_password.same' => 'New password does not match',
        ]);

        $user = Auth::user();

        if (Hash::check($request->oldpassword, $user->password)) {

            User::query()->find($user->id)->update([
                'password' => bcrypt($request->newpassword),
                'updated_at' => Carbon::now('GMT+3'),
            ]);

        }

        $notification = [
            'message' => 'Password changed',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
