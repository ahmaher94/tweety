@if (current_user()->isNot($user))
<form method="POST" action="/profiles/{{$user->username}}/follow">
    @csrf
    <button type="submit"
        class="bg-blue-500 rounded-full shadow py-2 px-4 text-white">{{ auth()->user()->isFollowing($user) ? 'Unfollow': 'Follow'}}</button>
</form>
@endif