@extends('layouts.app')

@section('content')

    <div class="flex w-full">
        <h1>All Posts</h1>
    </div> <br>
    <div class="w-full my-5">
        <form action="{{ route('posts.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}">
            <button type="submit" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Search</button>
    </div> <br>

    <div class="my-5">
        <ul class="py-5   px-5">
            @foreach ($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>

                     <h2>User: {{ $post->user->name }}</h2>
                </li>
                <hr
            @endforeach
        </ul>
    </div>

    {{ $posts->links() }}

@endsection
