<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UpdateSliderRequest;
use App\Models\HomeSlide;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class HomeSliderController extends Controller
{

    public function homeSlider()
    {
        $slider = HomeSlide::query()->find(1);
        return view('admin.home_slide.home_slide_all', compact('slider'));
    }

    public function updateSlider(UpdateSliderRequest $request, $id)
    {

        $validated = $request->validated();

        if ($request->file('slider_image')) {

            $image = $request->file('slider_image');
            $name = Str::uuid();

            Image::make($image)->resize(1200, 852)->save(storage_path('app/public/upload/home_slide/') . $name);

            $validated['slider_image'] = $name;

        }

        $data = HomeSlide::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->back()->with('status', 'slider-updated');
    }
}
