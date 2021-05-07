@extends('layouts.app')

@section('content')

<header class="mb-6 relative" style="max-width: 800px">
    <img src="/images/header.jpg" class="mb-2 rounded-lg">

    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
            <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>

        <div>
            <a class="rounded-full border border-grey-300 py-2 px-4 text-black mr-2">Edit Profile</a>
            <a class="bg-blue-500 rounded-full shadow py-2 px-4 text-white">Follow Me</a>
        </div>
    </div>

    <img src="{{ $user->avatar }}" alt="" class="rounded-full mr-2 absolute"
        style="width:150px; left:calc(50% - 75px); top:170px">

    <p class="text-sm mb-2">ssssssssssssssssssssssssssssssssssssssssssssss
        sssssssssssssssssssssssssssssssssssssssssssssss
        sssssssssssssssssssssssssssssssssssssssssss
    </p>

    @include('_timeline', [
    'tweets' => $user->tweets
    ])



</header>


@endsection