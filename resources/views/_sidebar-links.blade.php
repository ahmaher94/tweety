<ul>

    <li><a class="font-bold text-lg mb-4 block" href="/tweets">Home
        </a></li>
    <li><a class="font-bold text-lg mb-4 block" href="/explore">Explore
        </a></li>
    {{-- <li><a class="font-bold text-lg mb-4 block" href="/">Notifications
        </a></li>
    <li><a class="font-bold text-lg mb-4 block" href="/">Messages
        </a></li>
    <li><a class="font-bold text-lg mb-4 block" href="/">Bookmarks
        </a></li>
    <li><a class="font-bold text-lg mb-4 block" href="/">Lists
        </a></li> --}}
    <li><a class="font-bold text-lg mb-4 block" href="{{ route('profile', auth()->user()->username) }}">Profile
        </a></li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="font-bold text-lg mb-4 block">Logout</button>
        </form>
    </li>

    <li>
        <form action="{{route('search')}}" method="POST">
            @csrf
            <input type="search" id="site-search" name="search" />
            <button class="font-bold text-lg mb-4 block">Search</button>
        </form>
    </li>
</ul>