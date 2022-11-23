<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\Models\ArticlesMix as Articles;
use App\Http\Resources\ArticlesMix as MixResource;
use App\Http\Requests\ArticlesMixRequest as MixRequest;

class ArticlesMix extends Controller
{
    public function index()
    {
       //dd(URL::route('articles-mix.create'));
        //dd(Auth::user());
        //$mix = MixResource::collection(Articles::all());
        $mix = MixResource::collection(Articles::paginate(2));
        //dd($mix);
        return Inertia::render('Articles/Index', ['mix' => $mix]);
    }

    public function create()
    {
        return Inertia::render('Articles/Create');
    }


    public function store(MixRequest $request)
    {
        Articles::create($request->validated());
        return redirect()->route('articles-mix.index')
            ->with('message', 'Статья успешно создана!');
    }

    public function edit($id)
    {
        $article = Articles::find($id);
        return Inertia::render('Articles/Edit', ['article' => $article]);
    }

    public function update(MixRequest $request, $id)
    {
       Articles::find($id)->update($request->validated());
       return redirect()->route('articles-mix.index')
           ->with('message', 'Статья успешно изменена!');
    }

    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();
        return redirect()->route('articles-mix.index')
            ->with('message', "Статья «{$article->title}» успешно удалена!");
    }
}
