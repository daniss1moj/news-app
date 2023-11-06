<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>Document</title>
</head>
<body>
<body
        class='mx-auto mt-10 max-w-4xl bg-sky-200 text-slate-700'>
<nav class='mb-8 flex justify-between text-lg font-medium'>
    <ul class='flex space-x-2'>
        @if(auth()->user())
            <li>
                <a href="#">Profile</a>
            </li>
        @endif

    </ul>
    <ul class='flex items-center space-x-3'>
        @auth()
            <li>
                <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                    <button>
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="{{route('auth.login')}}">
                    Sign in
                </a>
            </li>
        @endauth
    </ul>
</nav>
@if (session('success'))
    <div class='my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-70'>
        <p class='font-bold'>Success!</p>
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class='my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-800 opacity-70'>
        <p class='font-bold'>Error!</p>
        <p>{{ session('error') }}</p>
    </div>
@endif

{{ $slot }}
</body>

</html>

</body>
</html>
