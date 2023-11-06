@extends('admin.layout.main')

@section('content')
    @if(count($news) > 0)
        <div class="d-flex flex-row gap-4 flex-wrap">
            @foreach($news as $article)
                <div class="card w-1/2 d-flex flex-column justify-content-between p-3">
                    <div style="width: 200px;" class="mx-auto">
                        <img src="{{  count($article->images) ? $article->images[0]->path : asset('assets/img/no-photo.jpg')}}"
                             class="card-img-top img-fluid"
                             alt="...">
                    </div>

                    <div class="card-body flex-grow-0" style="width: 300px;">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->description}}</p>
                        <div class="d-flex flex-row justify-content-between">
                            <a href="{{route('admin.news.edit', $article->id)}}" class="btn btn-primary h-50">Edit</a>
                            <div>
                                <form action="{{route('admin.news.destroy', $article->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex mx-auto mt-4" style="width: max-content;">
            {{ $news->links() }}
        </div>

    @else
        <h2>
            No news yet!
        </h2>
    @endif
@endsection