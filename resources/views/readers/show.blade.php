<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Collectie van {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($comics as $comic)
                            <div class="bg-gray-100 rounded-lg p-4 shadow">
                                @if ($comic->cover_path)
                                    <img src="{{ asset('storage/' . $comic->cover_path) }}" alt="Cover van {{ $comic->title }}" class="w-full h-60 object-cover rounded mb-2">
                                @endif

                                <h2 class="text-lg font-bold">{{ $comic->title }}</h2>
                                <p class="text-sm text-gray-700">
                                    {{ $comic->author }}
                                    @if ($comic->series) | {{ $comic->series }} #{{ $comic->number }} @endif
                                </p>
                                <p class="text-sm mt-1">Status: <span class="font-semibold">{{ $comic->status }}</span></p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('readers.index') }}" class="text-blue-600 hover:underline">⬅️ Terug naar alle lezers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
