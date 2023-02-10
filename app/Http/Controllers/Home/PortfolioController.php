<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StorePortfolioRequest;
use App\Http\Requests\Home\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function all()
    {
        $portfolio = Portfolio::query()->latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    }

    public function add()
    {
        return view('admin.portfolio.portfolio_add');
    }

    public function store(StorePortfolioRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('portfolio_image');
        $name = Str::uuid();

        Image::make($image)->resize(800, 800)->save(storage_path('app/public/upload/portfolio_images/') . $name);

        $validated['portfolio_image'] = $name;

        $data = new Portfolio();
        $data->fill($validated)->save();

        return redirect()->route('portfolio.all')->with('status', 'portfolio-added');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    }

    public function update(UpdatePortfolioRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('portfolio_image')) {

            $image = $request->file('portfolio_image');
            $name = Str::uuid();

            Image::make($image)->resize(800, 800)->save(storage_path('app/public/upload/portfolio_images/') . $name);

            $validated['portfolio_image'] = $name;

        }
        $data = Portfolio::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('portfolio.all')->with('status', 'portfolio-updated');
    }

    public function delete($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        $portfolio_image = $portfolio->portfolio_image;
        unlink(storage_path('app/public/upload/portfolio_images/') . $portfolio_image);

        Portfolio::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'portfolio-deleted');
    }

    public function details($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }

    public function portfolio()
    {
        $portfolio = Portfolio::query()->latest()->get();
        return view('frontend.portfolio',compact('portfolio'));
    }
}
