<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\AssignOp\Mul;

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

    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $name_generate = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension(); // 34534.png
            Image::make($multi_image)->resize(90, 90)->save('upload/multi_images/' . $name_generate);
            $save_url = 'upload/multi_images/' . $name_generate;

            MultiImage::query()->insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Multi image inserted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
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

    public function UpdateMultiImage(Request $request)
    {
        $image_id = $request->id;

        if ($request->file('multi_image')) {

            $image = $request->file('multi_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 34534.png
            Image::make($image)->resize(220, 220)->save('upload/multi_images/' . $name_generate);
            $save_url = 'upload/multi_images/' . $name_generate;

            MultiImage::query()->findOrFail($image_id)->update([
                'multi_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Image updated successfully',
                'alert-type' => 'success'
            ];
        }
        return redirect()->route('all.multi.image')->with($notification);
    }

    public function DeleteMultiImage($id)
    {
        $multiImage = MultiImage::query()->findOrFail($id);
        $img = $multiImage->multi_image;
        unlink($img);

        MultiImage::query()->findOrFail($id)->delete();

        $notification = [
            'message' => 'Image deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
