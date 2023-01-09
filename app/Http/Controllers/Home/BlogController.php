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
            'blog_short_description' => 'required',
        ], [
            'blog_category_id.required' => 'Name is required',
            'blog_title.required' => 'Title is required',
            'blog_description.required' => 'Description is required',
            'blog_image.required' => 'Image is required',
            'blog_short_description' => 'Short description is required',
        ]);

        $image = $request->file('blog_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 34534.png
        Image::make($image)->resize(430, 327)->save('upload/blog_images/' . $name_generate);
        $save_url = 'upload/blog_images/' . $name_generate;

        $image_blog_details = $request->file('blog_image');
        $name_generate = hexdec(uniqid()) . '.' . $image_blog_details->getClientOriginalExtension(); // 34534.png
        Image::make($image_blog_details)->resize(850, 430)->save('upload/blog_images/blog_details/' . $name_generate);
        $save_url_blog_details = 'upload/blog_images/blog_details/' . $name_generate;

        Blog::query()->insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_short_description' => $request->blog_short_description,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'blog_image_details' => $save_url_blog_details,
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

            $image_blog_details = $request->file('blog_image');
            $name_generate = hexdec(uniqid()) . '.' . $image_blog_details->getClientOriginalExtension(); // 34534.png
            Image::make($image_blog_details)->resize(850, 430)->save('upload/blog_images/blog_details/' . $name_generate);
            $save_url_blog_details = 'upload/blog_images/blog_details/' . $name_generate;

            Blog::query()->findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_short_description' => $request->blog_short_description,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,
                'blog_image_details' => $save_url_blog_details,
            ]);

        } else {

            Blog::query()->findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_short_description' => $request->blog_short_description,
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
        $blog_image_details = $blog->blog_image_details;
        unlink($blog_image);
        unlink($blog_image_details);

        Blog::query()->findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function BlogDetails($id)
    {
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        $all_blogs = Blog::query()->latest()->limit(5)->get();
        $blog = Blog::query()->findOrFail($id);
        return view('frontend.blog_details', compact('blog', 'all_blogs', 'categories'));
    }

    public function CategoryBlog($id)
    {
        $blog_post = Blog::query()->where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $all_blogs = Blog::query()->latest()->limit(5)->get();
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        $category_name = BlogCategory::query()->findOrFail($id);
        return view('frontend.category_blog_details', compact('blog_post', 'all_blogs', 'categories', 'category_name'));
    }

    public function HomeBlog()
    {
        $all_blogs = Blog::query()->latest()->paginate(3);
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog', compact('all_blogs', 'categories'));
    }
}
