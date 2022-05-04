@extends('layouts.app')

@section('content')
    <div class="bg-black min-h-screen text-white">
        <div class="container py-5">
            <div class="flex">
                <div class="flex-1 bg-white">
                    <h2 class="bg-cyan-500 p-3">Админнен мангалар!</h2>
                    <div class="p-4 flex">
                        <img class="h-36 w-28 object-cover" src="images/static/power.jpg" alt="">
                        <div class="text-cyan-600 px-4 flex flex-col justify-between">
                            <p class="text-3xl">Beginning after the end!</p>
                            <p><span>Year:</span> 2018</p>
                            <p><span>Status:</span> Ongoing</p>
                            <p><span>Genres:</span> Romance, Adventure, Isekai</p>
                        </div>
                    </div>
                </div>
                <div class="pl-4 w-1/3">
                    <img class="w-full h-full aspect-video object-cover" src="images/static/power.jpg" alt="">
                </div>
            </div>
            <div class="py-5">
                <div class="flex justify-between bg-white bg-cyan-500 p-3">
                    <p>Танымал Мангалар!</p>
                    <p>Тағыда...</p>
                </div>
                <div class="bg-white p-4 grid grid-cols-4 md:grid-cols-6 gap-4">
                    @foreach ($mangas as $manga)
                        <div class="bg-cyan-500 relative" style="aspect-ratio: 9 / 12">
                            <img class="w-full h-full object-cover" src="{{ $manga->image }}" alt="">
                            <h1 class="absolute bottom-0 left-0 p-2 flex justify-center text-center w-full"
                                style="background-color: rgba(0, 0, 0, 0.7)">{{ $manga->name }}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex">
                <div class="flex-1 bg-white">
                    <h2 class="bg-cyan-500 p-3">Соңғы бөлімдер!</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                        @foreach ($chapters as $chapter)
                            <a href="{{ route('readchapter', $chapter) }}">
                                <div class="p-4 flex bg-gray-200">
                                    <img class="h-20 aspect-square object-cover" src="{{ $chapter->parent()->image }}"
                                        alt="">
                                    <div class="text-gray-600 text-sm px-4 flex flex-col justify-center"
                                        style="width: calc(100% - 80px)">
                                        <p class="text-xl text-cyan-600 truncate">{{ $chapter->parent()->name }}</p>
                                        <p>Бөлім {{ $chapter->episode_name }}</p>
                                        {{-- <p>2 hours ago</p> --}}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="pl-4 w-1/3">
                    <img class="w-full h-full aspect-video object-cover" src="images/static/power.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
