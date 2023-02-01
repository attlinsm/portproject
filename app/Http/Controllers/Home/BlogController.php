<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreBlogRequest;
use App\Http\Requests\Home\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function allBlog()
    {
        $blogs = Blog::query()->latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    }

    public function addBlog()
    {
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('categories'));
    }

    public function storeBlog(StoreBlogRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('image');
        $name = Str::uuid();
        Image::make($image)->resize(430, 327)->save('upload/blog_images/' . $name);
        $validated['image'] = $name;

        $image_details = $request->file('image');
        $name_details = Str::uuid();
        Image::make($image_details)->resize(850, 430)->save('upload/blog_images/blog_details/' . $name_details);
        $validated['image_details'] = $name_details;

        $data = new Blog();
        $data->fill($validated)->save();

        return redirect()->route('blog.all')->with('status', 'blog-added');
    }

    public function editBlog($id)
    {
        $blogs = Blog::query()->findOrFail($id);
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));
    }

    public function updateBlog(UpdateBlogRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('image')) {

            $image = $request->file('image');
            $name = Str::uuid();
            Image::make($image)->resize(430, 327)->save('upload/blog_images/' . $name);
            $validated['image'] = $name;

            $image_details = $request->file('image');
            $name_details = Str::uuid();
            Image::make($image_details)->resize(850, 430)->save('upload/blog_images/blog_details/' . $name_details);
            $validated['image_details'] = $name_details;

        }

        $data = Blog::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('blog.all')->with('status', 'blog-updated');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::query()->findOrFail($id);
        $image = $blog->image;
        $image_details = $blog->image_details;
        unlink('upload/blog_images/' . $image);
        unlink('upload/blog_images/' . $image_details);

        Blog::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'blog-deleted');
    }

    public function blogDetails($id)
    {
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        $all_blogs = Blog::query()->latest()->limit(5)->get();
        $blog = Blog::query()->findOrFail($id);
        return view('frontend.blog_details', compact('blog', 'all_blogs', 'categories'));
    }

    public function categoryBlog($id)
    {
        $blog_post = Blog::query()->where('category_id', $id)->orderBy('id', 'DESC')->get();
        $all_blogs = Blog::query()->latest()->limit(5)->get();
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        $category_name = BlogCategory::query()->findOrFail($id);
        return view('frontend.category_blog_details', compact('blog_post', 'all_blogs', 'categories', 'category_name'));
    }

    public function homeBlog()
    {
        $all_blogs = Blog::query()->latest()->paginate(3);
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog', compact('all_blogs', 'categories'));
    }
}
