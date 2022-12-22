<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::query()->find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::query()->find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::query()->find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('d_m_Y_H-i') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.profile')->with($notification);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function ChangePassword()
    {
        return view('admin.admin_change_password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $users = User::query()->find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password updated successfully');

        } else {
            session()->flash('message', 'Old password is not match');
        }

        return redirect()->back();
    }
}
