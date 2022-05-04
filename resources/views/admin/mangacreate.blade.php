@extends('layouts.admin')

@section('content')
    <div class="bg-black flex-1 flex items-center justify-center">
        <div class="container max-w-2xl py-5 bg-white mx-4">
            <form action="{{ route('mangacreate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $manga ? $manga->id : old('id') }}">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="name" value="{{ $manga ? $manga->name : old('name') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Аты">

                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="description" value="{{ $manga ? $manga->description : old('description') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Сипаттама">

                @error('author')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="author" value="{{ $manga ? $manga->author : old('author') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Автор">

                @error('genres')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="genres" value="{{ $manga ? $manga->genres : old('genres') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Жанрлар">

                @error('type')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="type" value="{{ $manga ? $manga->type : old('type') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Тип">

                @error('released')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="released" value="{{ $manga ? $manga->released : old('released') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Шыққан жылы">

                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="flex items-center mb-4">
                    <div class="mr-4">
                        <img class="h-16 object-cover bg-gray-200 aspect-video flex justify-center items-center"
                            src="{{ $manga ? $manga->image : '' }}" alt="Img" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Суретті таңдау</span>
                        <input type="hidden" name="existedImage" value="{{ $manga ? $manga->image : old('image') }}" />
                        <input type="file" name="image" value="{{ old('image') }}"
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
