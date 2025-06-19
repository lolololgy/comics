<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mijn Comic Collectie
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('comics.create') }}">➕ Nieuwe comic toevoegen</a>

                    @if(session('success'))
                        <p class="success">{{ session('success') }}</p>
                    @endif

                    @foreach ($comics as $comic)
                        <div class="comic-card">
                            <h2><a href="{{ route('comics.show', $comic) }}">{{ $comic->title }}</a></h2>
                            <p>{{ $comic->author }} | {{ $comic->series }} #{{ $comic->number }}</p>
                            <p>Status: {{ $comic->status }}</p>
                            <img src="{{ asset('storage/' . $comic->cover_path) }}" alt="Cover van {{ $comic->title }}" width="200">

                            <a href="{{ route('comics.edit', $comic) }}">✏️ Bewerken</a>
                            <form action="{{ route('comics.destroy', $comic) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">🗑️ Verwijderen</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
