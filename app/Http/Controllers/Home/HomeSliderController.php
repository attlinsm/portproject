<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UpdateSliderRequest;
use App\Models\HomeSlide;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class HomeSliderController extends Controller
{

    public function HomeSlider()
    {
        $slider = HomeSlide::query()->find(1);
        return view('admin.home_slide.home_slide_all', compact('slider'));
    }

    public function UpdateSlider(UpdateSliderRequest $request, $id)
    {

        $validated = $request->validated();

        if ($request->file('home_slide')) {

            $image = $request->file('home_slide');
            $name = Str::uuid();
            Image::make($image)->resize(1200, 852)->save('upload/home_slide/' . $name);

            $validated['home_slide'] = $name;

        }
        $data = HomeSlide::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->back()->with('status', 'slider-updated');
    }
}
