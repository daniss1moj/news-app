@extends('admin.layout.main')

@section('content')
    <form action="{{route('admin.news.store')}}" method="POST" class="w-75 mx-auto">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="title" class="form-control" id="title" placeholder="Title"
                   value="{{old('title', '')}}">
            @error('title')
            <p class='mt-1 text-danger'>
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"
                      value="{{old('description', '')}}"></textarea>
            @error('description')
            <p class='mt-1 text-danger'>
                {{ $message }}
            </p>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Create</button>
    </form>
@endsection