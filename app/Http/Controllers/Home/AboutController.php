<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function AboutPage()
    {
        $aboutPage = About::query()->find(1);
        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {

            $image = $request->file('about_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 34534.png
            Image::make($image)->resize(523, 605)->save('upload/about_image/' . $name_generate);
            $save_url = 'upload/about_image/' . $name_generate;

            About::query()->findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = [
                'message' => 'About page updated with image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } else {

            About::query()->findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = [
                'message' => 'About page updated without image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    public function HomeAbout()
    {
        $aboutPage = About::query()->find(1);
        return view('frontend.about', compact('aboutPage'));
    }

    public function AboutMultiImage()
    {
        return view('admin.about_page.multi_image');
    }
}
