@extends('layouts.admin')

@section('content')
    <div class="bg-black flex-1 flex items-center justify-center">
        <div class="container max-w-2xl py-5 bg-white mx-4">
            <form action="{{ route('episodecreate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $episode ? $episode->id : old('id') }}">
                @error('manga')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <select requried name="manga" class="mb-4 p-2 w-full">
                    <option value={{ null }}>Манганы таңдау</option>
                    @foreach ($mangas as $manga)
                        <option value="{{ $manga->id }}">{{ $manga->name }}</option>
                    @endforeach
                </select>
                @error('episode_name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="episode_name" value="{{ $episode ? $episode->episode_name : old('episode_name') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-episode_name" type="text" placeholder="Бөлім">
                @error('images')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="flex items-center mb-4">
                    {{-- <div class="mr-4">
                        <img class="h-16 object-cover bg-gray-200 aspect-video flex justify-center items-center"
                            src="{{ $episode ? $episode->image : '' }}" alt="Img" />
                    </div> --}}
                    <label class="block">
                        <span class="sr-only">Суретті таңдау</span>
                        <input type="hidden" name="existedImage"
                            value="{{ $episode ? $episode->image : old('images') }}" />
                        <input multiple type="file" name="images[]" value="{{ old('images') }}"
                            class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100">
                    </label>
                </div>
                <button
                    class="w-full flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2"
                    type="submit">
                    Қосу
                </button>
                </p>
            </form>
        </div>
    </div>
@endsection
