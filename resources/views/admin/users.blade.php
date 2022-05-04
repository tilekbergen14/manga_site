@extends('layouts.admin')

@section('content')
    <div class="bg-black flex-1">
        <div class="container py-5">
            <div class="flex">
                <div class="flex-1 bg-white">
                    <h2 class="bg-cyan-500 p-3 text-white">Пайдаланушылар</h2>
                    <div class="p-0 flex">
                        <div class="rounded-t-xl overflow-hidden bg-gradient-to-r p-2 w-full">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-black px-4 py-2">Аты</th>
                                        <th class="border border-black px-4 py-2">Рөл</th>
                                        <th class="border border-black px-4 py-2">Командалар</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="">
                                            <td class="border border-black px-4 py-2 font-medium">{{ $user->name }}
                                            </td>
                                            <td class="border border-black px-4 py-2 font-medium">
                                                {{ $user->isadmin ? 'Админ' : 'Пайдаланушы' }}
                                            </td>
                                            <td class="border border-black px-4 py-2 font-medium text-center">
                                                <form action="{{ route('makeadmin', $user) }}" method="POST">
                                                    @csrf
                                                    <button
                                                        class="flex-shrink-0 rounded bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2"
                                                        type="submit">
                                                        {{ !$user->isadmin ? 'Админ ету' : 'Пайдаланушы ету' }}
                                                    </button>
                                                </form>
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
