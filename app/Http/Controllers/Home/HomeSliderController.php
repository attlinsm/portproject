<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\Facades\Image;


class HomeSliderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function HomeSlider()
    {
        $homeSlider = HomeSlide::query()->find(1);
        return view('admin.home_slide.home_slide_all', compact('homeSlider'));
    }

    public function UpdateSlider(Request $request)
    {
        $slide_id = $request->id;

        if ($request->file('home_slide')) {

            $image = $request->file('home_slide');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 34534.png
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_generate);
            $save_url = 'upload/home_slide/' . $name_generate;

            HomeSlide::query()->findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url
            ]);

            $notification = [
                'message' => 'Home slider updated with image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } else {

            HomeSlide::query()->findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = [
                'message' => 'Home slider updated without image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
