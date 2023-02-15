<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogCategoryRequest;
use App\Http\Requests\Admin\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function all()
    {
        $blogCategory = BlogCategory::query()->latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogCategory'));
    }

    public function add()
    {
        return view('admin.blog_category.blog_category_add');
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $validated = $request->validated();

        $data = new BlogCategory();
        $data->fill($validated)->save();

        return redirect()->route('blog.category.all')->with('status', 'blog-category-added');
    }

    public function edit($id)
    {
        $blogCategory = BlogCategory::query()->findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogCategory'));
    }

    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        $validated = $request->validated();

        $data = BlogCategory::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('blog.category.all')->with('status', 'blog-category-updated');
    }

    public function delete($id)
    {
        BlogCategory::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'blog-category-deleted');
    }
}
