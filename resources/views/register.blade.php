@extends('layouts.app')

@section('content')
    <div class="bg-black flex-1 flex items-center justify-center">
        <div class="container max-w-md py-5 bg-white mx-4">
            <form action="" method="POST">
                @csrf
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="name" value="{{ old('name') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Аты">
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="email" value="{{ old('email') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Почта">
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="password" value="{{ old('password') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Құпиясөз">
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="password_confirmation" value="{{ old('password_confirmation') }}"
                    class="mb-4 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Құпиясөзді қайталау">
                <button
                    class="w-full flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2"
                    type="submit">
                    Тіркелу
                </button>
                <p class="text-black text-center mt-4">Аккаунт барма? <a href="/login" class="text-cyan-500">Кіру</a>
            </form>
        </div>
    </div>
@endsection
