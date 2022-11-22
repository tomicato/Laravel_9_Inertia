<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\PortfolioResource;

class PortfolioController extends Controller
{

    public function index()
    {
        $portfolio = PortfolioResource::collection(Portfolio::all());
        return Inertia::render('Portfolio/Index', ['portfolio' => $portfolio]);
    }


    public function create()
    {
        return Inertia::render('Portfolio/Create');
    }


    public function store(PortfolioRequest $request)
    {
        $portfolio = Portfolio::add($request->validated());
        $portfolio->uploadPhoto($portfolio, $request->file('main_photo'));
        return redirect()->route('portfolio.index')
            ->with('message', 'Работа успешно добавлена в портфолио!');
    }


    public function show(Portfolio $portfolio)
    {
        //
    }


    public function edit($id)
    {
        return Inertia::render('Portfolio/Edit', ['portfolio' => Portfolio::find($id)]);
    }


    public function update(PortfolioRequest $request, $id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->edit($portfolio, $request->validated());
        $portfolio->editPhoto($portfolio, $request->file('main_photo'));
        return redirect()->route('portfolio.index')
            ->with('message', "Портфолио успешно отредактировано!");
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
