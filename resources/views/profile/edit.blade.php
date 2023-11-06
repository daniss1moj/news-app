<x-layout>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class='mb-4 grid grid-cols-2 gap-4'>
            <div class="col-span-2">
                <label for="gender">Gender</label>
                <x-text-input name="gender" :value="$profile->gender"/>
            </div>
            <div>
                <label for="avatar">Avatar</label>
                <input type="file"
                       name="avatar"
                       class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 file:dark:bg-gray-800 file:font-medium file:hover:bg-gray-200 file:dark:hover:bg-gray-700 file:hover:cursor-pointer file:mr-4"/>
                @error('avatar')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class='col-span-2'>
                <x-button class='w-full'>Edit Profile</x-button>
            </div>
        </div>
    </form>
</x-layout>
