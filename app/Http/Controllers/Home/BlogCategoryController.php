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

    public function EditBlogCategory($id)
    {
        $blogCategory = BlogCategory::query()->findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogCategory'));
    }

    public function UpdateBlogCategory(Request $request, $id)
    {
        $request->validate([
            'blog_category' => 'required'
        ]);

        BlogCategory::query()->findOrFail($id)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = [
            'message' => 'Blog category updated successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::query()->findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog category deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
