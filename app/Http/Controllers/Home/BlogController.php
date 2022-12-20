<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::query()->latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('categories'));
    }

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ], [
            'blog_category_id.required' => 'Name is required',
            'blog_title.required' => 'Title is required',
            'blog_description.required' => 'Description is required',
            'blog_image.required' => 'Image is required',
        ]);

        $image = $request->file('blog_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 34534.png
        Image::make($image)->resize(430, 327)->save('upload/blog_images/' . $name_generate);
        $save_url = 'upload/blog_images/' . $name_generate;

        Blog::query()->insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog added successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id)
    {
        $blogs = Blog::query()->findOrFail($id);
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));
    }

    public function UpdateBlog(Request $request, $id)
    {
        if ($request->file('blog_image')) {

            $image = $request->file('blog_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 34534.png
            Image::make($image)->resize(430, 327)->save('upload/blog_images/' . $name_generate);
            $save_url = 'upload/blog_images/' . $name_generate;

            Blog::query()->findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,
            ]);

        } else {

            Blog::query()->findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
            ]);

        }

        $notification = [
            'message' => 'Blog updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog')->with($notification);
    }

    public function DeleteBlog($id)
    {
        $blog = Blog::query()->findOrFail($id);
        $blog_image = $blog->blog_image;
        unlink($blog_image);

        Blog::query()->findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
