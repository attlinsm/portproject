<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreBlogCategoryRequest;
use App\Http\Requests\Home\UpdateBlogCategoryRequest;
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

    public function StoreBlogCategory(StoreBlogCategoryRequest $request)
    {
        $validated = $request->validated();

        $data = new BlogCategory();
        $data->fill($validated)->save();

        return redirect()->route('blog.category.all')->with('status', 'blog-category-added');
    }

    public function EditBlogCategory($id)
    {
        $blogCategory = BlogCategory::query()->findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogCategory'));
    }

    public function UpdateBlogCategory(UpdateBlogCategoryRequest $request, $id)
    {
        $validated = $request->validated();

        $data = BlogCategory::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('blog.category.all')->with('status', 'blog-category-updated');
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'blog-category-deleted');
    }
}
