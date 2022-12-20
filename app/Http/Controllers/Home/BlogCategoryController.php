<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $blogCategory = BlogCategory::query()->latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogCategory'));
    }

    public function AddBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
    }

    public function StoreBlogCategory(Request $request)
    {
        $request->validate([
            'blog_category' => 'required'
        ],[
            'blog_category.required' => 'Name is required'
        ]);

        BlogCategory::query()->insert([
            'blog_category' => $request->blog_category,
        ]);

        $notification = [
            'message' => 'Blog category added successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog.category')->with($notification);
    }
}
