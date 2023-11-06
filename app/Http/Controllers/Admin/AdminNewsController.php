<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Services\UnsplashService;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{

    public function __construct(public UnsplashService $unsplashService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('images')->paginate(3);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();

        $imgPath = $this->unsplashService->getRandomPhoto()->urls->raw;
        $article = $request->user()->news()->create($data);
        $article->images()->create([
            'path' => $imgPath
        ]);
        return redirect()->route('admin.news.index')->with('success', 'Article was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['article' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->validated();

        $regeneratePhoto = $data['generateNew'] ?? null;

        if ($regeneratePhoto) {
            unset($data['generateNew']);
            $imgPath = $this->unsplashService->getRandomPhoto()->urls->raw;
            if (count($news->images) > 0) {
                $news->images()->where('id', $news->images[0]->id)->update([
                    'path' => $imgPath
                ]);
            } else {
                $news->images()->create([
                    'path' => $imgPath
                ]);
            }
        }
        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Article was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->deleteOrFail();

        return redirect()->route('admin.news.index')->with('success', 'Article was deleted!');
    }
}
