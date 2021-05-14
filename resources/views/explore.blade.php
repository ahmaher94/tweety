<x-app>

    <div>
        @foreach ($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center">
            <img src="{{ $user->avatar }}" width="60px" class="mr-4 mb-4 rounded">

            <div>
                <h4 class="font-bold">{{ '@'.$user->username }}</h4>
            </div>

        </a>

        @endforeach

        {{ $users->links() }}
    </div>



</x-app>