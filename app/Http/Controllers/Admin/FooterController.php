<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UpdateFooterRequest;
use App\Models\Footer;

class FooterController extends Controller
{
    public function setup()
    {
        $footer = Footer::query()->find(1);
        return view('admin.footer.footer_all', compact('footer'));
    }

    public function update(UpdateFooterRequest $request, $id)
    {
        $validated = $request->validated();

        $data = Footer::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->back()->with('status', 'footer-updated');
    }
}
