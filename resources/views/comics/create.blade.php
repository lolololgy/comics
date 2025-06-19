<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe Comic Toevoegen
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label>Titel</label>
                        <input type="text" name="title" required><br>

                        <label>Auteur/Tekenaar</label>
                        <input type="text" name="author" required><br>

                        <label>Serie</label>
                        <input type="text" name="series"><br>

                        <label>Nummer</label>
                        <input type="number" name="number"><br>

                        <label>Genre</label>
                        <input type="text" name="genre"><br>

                        <label>Status</label>
                        <select name="status" required>
                            <option value="gelezen">Gelezen</option>
                            <option value="wishlist">Wishlist</option>
                            <option value="in_bezit">In bezit</option>
                        </select><br>

                        <label>Cover afbeelding</label>
                        <input type="file" name="cover"><br>

                        <button type="submit">💾 Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
