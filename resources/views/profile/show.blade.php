<x-layout>

    @if(auth()->user()->profile)
        <div class="px-10 my-4 py-6 bg-white rounded-lg font-bold">
            <h2 class="text-4xl text-blue-700 text-center">Profile</h2>
            <div class="flex justify-between">
                <div class="flex flex-col justify-between gap-3 items-start">
                    <p>Gender: {{auth()->user()->profile->gender ?? 'Not specified'}}</p>
                    <form action="{{route('profile.destroy')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300
                            font-medium rounded-lg text-sm p-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            Delete Profile
                        </button>
                    </form>
                    <a href="{{route('profile.edit')}}"
                       class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300
                   font-medium rounded-lg text-sm p-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Edit Profile</a>
                </div>
                <div class="space-y-3">
                    <p>Avatar</p>
                    @if(auth()->user()->profile?->avatar)
                        <img class="w-10 h-10 rounded-full" src="{{auth()->user()->profile->src}}"
                             alt="Rounded avatar">

                    @else
                        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @else
        <h1>Profile was deleted!</h1>
    @endif
    <div class="grid grid-cols-3 gap-4">
        @forelse($news as $article)
            <div class="px-10 my-4 py-6 bg-white rounded-lg shadow-md">
                <div class="w-[200px] h-[200px]">
                    <img src="{{count($article->images) ? $article->images[0]->path : asset('assets/img/no-photo.jpg')}}"
                         class="w-full h-full rounded-md object-fit-cover"/>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-light text-gray-600">{{$article->created_at->diffForHumans()}}</span>
                </div>
                <div class="mt-2">
                    <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{$article->title}}</a>
                    <p class="mt-2 text-gray-600">{{$article->description}}</p>
                </div>
                <div>
                </div>
            </div>
        @empty
            <h1>No news yet!</h1>
        @endforelse

    </div>

    <div class="d-flex justify-content-center">
        {{$news->links('pagination::tailwind')}}
    </div>
</x-layout>