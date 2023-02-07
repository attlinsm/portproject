<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreMultiImageRequest;
use App\Http\Requests\Home\UpdateAboutRequest;
use App\Http\Requests\Home\UpdateMultiImageRequest;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{

    public function aboutPage()
    {
        $aboutPage = About::query()->find(1);
        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }

    public function updateAbout(UpdateAboutRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('about_image')) {

            $image = $request->file('about_image');
            $name = Str::uuid();
            Image::make($image)->resize(523, 605)->save('upload/about_image/' . $name);
            $validated['about_image'] = $name;
        }
        $data = About::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->back()->with('status', 'about-updated');
    }

    public function homeAbout()
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

            Image::make($multi_image)->resize(90, 90)->save('upload/multi_images/' . $name);

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
            Image::make($image)->resize(220, 220)->save('upload/multi_images/' . $name);
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
        unlink('upload/multi_images/' . $img);

        MultiImage::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'image-deleted');
    }
}
