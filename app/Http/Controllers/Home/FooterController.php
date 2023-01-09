<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function FooterSetup()
    {
        $footer = Footer::query()->find(1);
        return view('admin.footer.footer_all', compact('footer'));
    }

    public function UpdateFooter(Request $request, $id)
    {
        Footer::query()->findOrFail($id)->update([
            'number' => $request->number,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'gitlab' => $request->gitlab,
            'copyright' => $request->copyright,
            'short_description' => $request->short_description,
        ]);

        $notification = [
            'message' => 'Footer updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
