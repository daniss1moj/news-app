<x-layout>
    <h1 class='my-16 text-center text-3xl font-medium text-slate-600'>Sign in to your account</h1>
    <x-card class='px-16 py-8'>
        <form action="{{route('auth.store')}}" method="POST">
            @csrf
            <div class='mb-8'>
                <label for="email" class='mb-2 block text-sm font-medium text-slate-900'>E-mail</label>
                <x-text-input name="email"/>
            </div>
            <div class='mb-8'>
                <label for="password" class='mb-2 block text-sm font-medium text-slate-900'>Password</label>
                <x-text-input name="password" type="password"/>
            </div>

       
            <x-button class='w-full bg-green-300'>Sign in</x-button>

        </form>
    </x-card>
</x-layout>

