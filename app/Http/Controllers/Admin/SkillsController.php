<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSkillsRequest;
use App\Http\Requests\Admin\UpdateSkillsRequest;
use App\Models\Skills;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SkillsController extends Controller
{
    public function new()
    {
        return view('admin.skills.skills_add');
    }

    public function store(StoreSkillsRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('image');
        $icon = $request->file('icon');

        $image_name = Str::uuid();
        $icon_name = Str::uuid();

        Image::make($image)->resize(310, 230)->save(public_path('upload/skills_images/') . $image_name);
        Image::make($icon)->resize(45, 45)->save(public_path('upload/skills_images/icons/') . $icon_name);

        $validated['image'] = $image_name;
        $validated['icon'] = $icon_name;

        $data = new Skills();
        $data->fill($validated)->save();

        return redirect()->route('skills.all')->with('status', 'skill-added');
    }

    public function all()
    {
        $skills = Skills::query()->latest()->get();
        return view('admin.skills.skills_all', compact('skills'));
    }

    public function edit($id)
    {
        $skill = Skills::query()->findOrFail($id);
        return view('admin.skills.skills_edit', compact('skill'));
    }

    public function delete($id)
    {
        $skill = Skills::query()->findOrFail($id);

        $image = $skill->image;
        $icon = $skill->icon;

        unlink(public_path('upload/skills_images/') . $image);
        unlink(public_path('upload/skills_images/icons/') . $icon);

        Skills::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'skill-deleted');
    }

    public function update(UpdateSkillsRequest $request, $id)
    {
        $validated = $request->validated();

        if (isset($validated['image'])) {

            $image = $request->file('image');

            $image_name = Str::uuid();

            Image::make($image)->resize(310, 230)->save(public_path('upload/skills_images/') . $image_name);

            $validated['image'] = $image_name;

        }
        if (isset($validated['icon'])) {

            $icon = $request->file('icon');

            $icon_name = Str::uuid();

            Image::make($icon)->resize(45, 45)->save(public_path('upload/skills_images/icons/') . $icon_name);

            $validated['icon'] = $icon_name;

        }

        $data = Skills::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('skills.all')->with('status', 'skill-updated');
    }
}
