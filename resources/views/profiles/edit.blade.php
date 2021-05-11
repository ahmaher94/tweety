<x-app>

    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method("PATCH")


        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full"
                value="{{ $user->name }}">
            @error('name')
            <p class="text-red-500 text-xs mt-2">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full"
                value="{{ $user->username }}">
            @error('username')
            <p class="text-red-500 text-xs mt-2">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="border border-gray-400 p-2 w-full"
                value="{{ $user->avatar }}">
            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full"
                value="{{ $user->email }}">
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input type="text" name="password" id="password" class="border border-gray-400 p-2 w-full" required>
            @error('password')
            <p class="text-red-500 text-xs mt-2">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Confirm Password</label>
            <input type="text" name="password_confirmation" id="password_confirmation"
                class="border border-gray-400 p-2 w-full">
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{  $message }}</p>
            @enderror
        </div>

        <div>
            <button class="big-blue-400  rounded py-2 px-4 hover:big-blue-500" type="submit">Submit</button>
        </div>



    </form>



</x-app>