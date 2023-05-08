<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\RoleRequest;
use App\Models\News;
use App\Models\Resource;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $news = $user->news()->paginate(10);

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        News::create([
            'title' => $request->name,
            'content' => $request->role,
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('news.index')
            ->withSuccess('Notícia criada com sucesso.');
    }

    public function edit(News $news): View
    {
        return view('news.edit', ['news' => $news]);
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')
            ->withSuccess('Notícia atualizada com sucesso.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('news.index')
            ->withSuccess('Notícia removida com sucesso.');
    }
}
