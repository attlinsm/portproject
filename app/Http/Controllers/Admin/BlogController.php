<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreBlogRequest;
use App\Http\Requests\Home\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comments;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function all()
    {
        $blogs = Blog::query()->latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    }

    public function add()
    {
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('categories'));
    }

    public function store(StoreBlogRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('image');
        $name = Str::uuid();

        Image::make($image)->resize(430, 327)->save(storage_path('app/public/upload/blog_images/') . $name);

        $validated['image'] = $name;

        $image_details = $request->file('image');
        $name_details = Str::uuid();

        Image::make($image_details)->resize(850, 430)->save(storage_path('app/public/upload/blog_images/blog_details/') . $name_details);

        $validated['image_details'] = $name_details;

        $data = new Blog();
        $data->fill($validated)->save();

        return redirect()->route('blog.all')->with('status', 'blog-added');
    }

    public function edit($id)
    {
        $blogs = Blog::query()->findOrFail($id);
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('image')) {

            $image = $request->file('image');
            $name = Str::uuid();

            Image::make($image)->resize(430, 327)->save(storage_path('app/public/upload/blog_images/') . $name);
            $validated['image'] = $name;

            $image_details = $request->file('image');
            $name_details = Str::uuid();

            Image::make($image_details)->resize(850, 430)->save(storage_path('app/public/upload/blog_images/blog_details/') . $name_details);

            $validated['image_details'] = $name_details;

        }

        $data = Blog::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('blog.all')->with('status', 'blog-updated');
    }

    public function delete($id)
    {
        $blog = Blog::query()->findOrFail($id);
        $image = $blog->image;
        $image_details = $blog->image_details;
        unlink(storage_path('app/public/upload/blog_images/') . $image);
        unlink(storage_path('app/public/upload/blog_images/') . $image_details);

        Blog::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'blog-deleted');
    }

    public function details($id)
    {
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        $all_blogs = Blog::query()->latest()->limit(5)->get();
        $blog = Blog::query()->findOrFail($id);
        $comments = Comments::query()->where('blog_id', '=', $id)->get()->all();
        return view('frontend.blog_details', compact('blog', 'all_blogs', 'categories', 'comments'));
    }

    public function category($id)
    {
        $blog_post = Blog::query()->where('category_id', $id)->orderBy('id', 'DESC')->get();
        $all_blogs = Blog::query()->latest()->limit(5)->get();
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        $category_name = BlogCategory::query()->findOrFail($id);
        return view('frontend.category_blog_details', compact('blog_post', 'all_blogs', 'categories', 'category_name'));
    }

    public function blog()
    {
        $all_blogs = Blog::query()->latest()->paginate(3);
        $categories = BlogCategory::query()->orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog', compact('all_blogs', 'categories'));
    }
}
