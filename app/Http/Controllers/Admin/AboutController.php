<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMultiImageRequest;
use App\Http\Requests\Admin\UpdateAboutRequest;
use App\Http\Requests\Admin\UpdateMultiImageRequest;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{

    public function edit()
    {
        $aboutPage = About::query()->find(1);
        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }

    public function update(UpdateAboutRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('about_image')) {

            $image = $request->file('about_image');
            $name = Str::uuid();

            Image::make($image)->resize(523, 605)->save(public_path('upload/about_image/') . $name);

            $validated['about_image'] = $name;

            $data = About::query()->findOrFail($id);

            if ($data->about_image) {

                $old_image = $data->about_image;
                unlink(public_path('upload/about_image/') . $old_image);

            }

            $data->fill($validated)->save();
        }

        return redirect()->back()->with('status', 'about-updated');
    }

    public function about()
    {
        $aboutPage = About::query()->find(1);
        return view('frontend.about', compact('aboutPage'));
    }

    public function aboutMultiImage()
    {
        return view('admin.about_page.multi_image');
    }

    public function storeMultiImage(StoreMultiImageRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {

            $name = Str::uuid();

            Image::make($multi_image)->resize(90, 90)->save(public_path('upload/multi_images/') . $name);

            $validated['multi_image'] = $name;

            $data = new MultiImage();
            $data->fill($validated)->save();

        }

        return redirect()->back()->with('status', 'multi-updated');
    }

    public function AllMultiImage()
    {
        $all_multi_image = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('all_multi_image'));
    }

    public function EditMultiImage($id)
    {
        $multiImage = MultiImage::query()->findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function UpdateMultiImage(UpdateMultiImageRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('multi_image')) {

            $image = $request->file('multi_image');
            $name = Str::uuid();

            Image::make($image)->resize(220, 220)->save(public_path('upload/multi_images/') . $name);

            $validated['multi_image'] = $name;

            $data = MultiImage::query()->findOrFail($id);
            $data->fill($validated)->save();

        }

        return redirect()->route('multi.image.all')->with('status', 'multi-updated');
    }

    public function DeleteMultiImage($id)
    {
        $multiImage = MultiImage::query()->findOrFail($id);
        $img = $multiImage->multi_image;
        unlink(public_path('upload/multi_images/') . $img);

        MultiImage::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'image-deleted');
    }
}
