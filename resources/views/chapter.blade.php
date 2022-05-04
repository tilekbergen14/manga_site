@extends('layouts.app')

@section('content')
    <div class="bg-black min-h-screen text-white">
        <div class="container py-5">
            <div class="flex">
                <div class="flex-1 bg-white">
                    <h2 class="bg-cyan-500 p-3">{{ $chapter->parent()->name }} | Бөлім {{ $chapter->episode_name }}</h2>
                    @if ($chapter->images)
                        @foreach (json_decode($chapter->images) as $image)
                            <img src="/{{ $image }}" alt="image" class="w-full">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
