<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comic Bewerken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label>Titel</label>
                        <input type="text" name="title" value="{{ old('title', $comic->title) }}" required><br>

                        <label>Auteur/Tekenaar</label>
                        <input type="text" name="author" value="{{ old('author', $comic->author) }}" required><br>

                        <label>Serie</label>
                        <input type="text" name="series" value="{{ old('series', $comic->series) }}"><br>

                        <label>Nummer</label>
                        <input type="number" name="number" value="{{ old('number', $comic->number) }}"><br>

                        <label>Genre</label>
                        <input type="text" name="genre" value="{{ old('genre', $comic->genre) }}"><br>

                        <label>Status</label>
                        <select name="status" required>
                            <option value="gelezen" {{ $comic->status == 'gelezen' ? 'selected' : '' }}>Gelezen</option>
                            <option value="wishlist" {{ $comic->status == 'wishlist' ? 'selected' : '' }}>Wishlist</option>
                            <option value="in_bezit" {{ $comic->status == 'in_bezit' ? 'selected' : '' }}>In bezit</option>
                        </select><br>

                        <label>Nieuwe cover afbeelding (optioneel)</label>
                        <input type="file" name="cover"><br>

                        <button type="submit">💾 Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
