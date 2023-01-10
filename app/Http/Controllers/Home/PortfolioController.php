<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StorePortfolioRequest;
use App\Http\Requests\Home\UpdatePortfolioRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfolio = Portfolio::query()->latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    }

    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(StorePortfolioRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('portfolio_image');
        $name = Str::uuid();
        Image::make($image)->resize(1020, 519)->save('upload/portfolio_images/' . $name);
        $validated['portfolio_image'] = $name;

        Portfolio::query()->insert([
            'portfolio_name' => $validated['portfolio_name'],
            'portfolio_title' => $validated['portfolio_title'],
            'portfolio_description' => $validated['portfolio_description'],
            'portfolio_image' => $validated['portfolio_image'],
        ]);

        return redirect()->route('portfolio.all')->with('status', 'portfolio-added');
    }

    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    }

    public function UpdatePortfolio(UpdatePortfolioRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->file('portfolio_image')) {

            $image = $request->file('portfolio_image');
            $name = Str::uuid();
            Image::make($image)->resize(1020, 519)->save('upload/portfolio_images/' . $name);
            $validated['portfolio_image'] = $name;

        }
        $data = Portfolio::query()->findOrFail($id);
        $data->fill($validated)->save();

        return redirect()->route('portfolio.all')->with('status', 'portfolio-updated');
    }

    public function DeletePortfolio($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        $portfolio_image = $portfolio->portfolio_image;
        unlink('upload/portfolio_images/' . $portfolio_image);

        Portfolio::query()->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'portfolio-deleted');
    }

    public function PortfolioDetails($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }

    public function HomePortfolio()
    {
        $portfolio = Portfolio::query()->latest()->get();
        return view('frontend.portfolio',compact('portfolio'));
    }
}
