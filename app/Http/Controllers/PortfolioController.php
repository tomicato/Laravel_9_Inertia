<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class PortfolioController extends Controller
{

    public function index()
    {
        $portfolio = Portfolio::all();
        return Inertia::render('Portfolio/Index', ['portfolio' => $portfolio]);
    }


    public function create()
    {
        return Inertia::render('Portfolio/Create');
    }


    public function store(Request $request)
    {
        $portfolio = Portfolio::add($request->all());
        $portfolio->uploadPhoto($portfolio, $request->file('main_photo'));
        return redirect()->route('portfolio.index')
            ->with('message', 'Работа успешно добавлена в портфолио!');
    }


    public function show(Portfolio $portfolio)
    {
        //
    }


    public function edit(Portfolio $portfolio)
    {
        //
    }


    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }


    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->deletePhoto($portfolio->main_photo);
        $portfolio->delete();
        return redirect()->route('portfolio.index')
            ->with('message', "Работа успешно удалена из портфолио!");
    }
}
