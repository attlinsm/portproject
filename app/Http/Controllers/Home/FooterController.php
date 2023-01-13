<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UpdateFooterRequest;
use App\Models\Footer;

class FooterController extends Controller
{
    public function FooterSetup()
    {
        $footer = Footer::query()->find(1);
        return view('admin.footer.footer_all', compact('footer'));
    }

    public function UpdateFooter(UpdateFooterRequest $request, $id)
    {
        $validated = $request->validated();

        $data = Footer::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->back()->with('status', 'footer-updated');
    }
}
