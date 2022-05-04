@extends('layouts.admin')

@section('content')
    <div class="bg-black flex-1">
        <div class="container py-5">
            <div class="flex">
                <div class="flex-1 bg-white">
                    <h2 class="bg-cyan-500 p-3 text-white">Мангалар</h2>
                    <div class="p-0 flex">
                        <div class="rounded-t-xl overflow-hidden bg-gradient-to-r p-2 w-full">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-black px-4 py-2">Сурет</th>
                                        <th class="border border-black px-4 py-2">Аты</th>
                                        <th class="border border-black px-4 py-2">Бөлім</th>
                                        <th class="border border-black px-4 py-2">Командалар</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($episodes as $episode)
                                        <tr class="hover:bg-teal-100 cursor-pointer">
                                            <td class="border border-black px-4 py-2 font-medium"><img
                                                    class="h-12 aspect-video object-cover"
                                                    src="{{ $episode->parent()->image }}" alt="image"></td>
                                            <td class="border border-black px-4 py-2 font-medium">
                                                {{ $episode->parent()->name }}
                                            </td>
                                            <td class="border border-black px-4 py-2 font-medium">
                                                {{ $episode->episode_name }}
                                            </td>
                                            <td class="border border-black px-4 py-2 font-medium text-center">
                                                <div class="flex justify-center">
                                                    {{-- <form action="{{ route('episodeedit', $episode) }}">
                                                        <button
                                                            class="mr-2 flex-shrink-0 rounded bg-yellow-500 hover:bg-yellow-700 border-yellow-500 hover:border-yellow-700 text-sm border-4 text-white py-1 px-2">
                                                            Өзгерту</button>
                                                    </form> --}}
                                                    <form action="{{ route('episodedelete', $episode) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            class="flex-shrink-0 rounded bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 text-sm border-4 text-white py-1 px-2">
                                                            Жою</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
