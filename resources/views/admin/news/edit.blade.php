@extends('admin.layout.main')

@section('content')
    <form action="{{route('admin.news.update', $article->id)}}" method="POST" class="w-75 mx-auto">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="title" class="form-control" id="title" placeholder="Title"
                   value="{{$article->title}}">
            @error('title')
            <p class='mt-1 text-danger'>
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"
            >{{$article->description}}</textarea>
            @error('description')
            <p class='mt-1 text-danger'>
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <input type="checkbox" name="generateNew"/>
            <label for="generateNew">
                Generate new photo?
            </label>
            @error('generateNew')
            <p class='mt-1 text-danger'>
                {{ $message }}
            </p>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Update</button>
    </form>
@endsection