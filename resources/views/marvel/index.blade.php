<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-yellow-500">Marvel Comics Explorer</h2>
    </x-slot>

    <div class="py-6 px-4">
        <form method="GET" class="mb-4">
            <input type="text" name="q" placeholder="Zoek Marvel comics..." class="border px-2 py-1">
            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Zoek</button>
        </form>

        @if(session('success'))
            <p class="text-green-600 font-bold">{{ session('success') }}</p>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($comics as $comic)
                <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center justify-between h-[400px] w-[300px] mx-auto">
                    <h3 class="text-lg font-semibold text-center mb-2">{{ $comic['title'] }}</h3>

                    @if(isset($comic['thumbnail']))
                        @php
                            $coverUrl = $comic['thumbnail']['path'] . '.' . $comic['thumbnail']['extension'];
                        @endphp
                        <img src="{{ $coverUrl }}" alt="{{ $comic['title'] }}" class="max-w-[150px] h-[200px] object-cover my-2 rounded">
                    @endif

                    <form method="POST" action="{{ route('marvel.store') }}" class="favorite-form w-full mt-2" data-id="{{ $comic['id'] }}">
                        @csrf
                        <input type="hidden" name="title" value="{{ $comic['title'] }}">
                        <input type="hidden" name="series" value="{{ $comic['series']['name'] ?? '' }}">
                        <input type="hidden" name="number" value="{{ $comic['issueNumber'] ?? 0 }}">
                        <input type="hidden" name="author" value="Marvel">
                        <input type="hidden" name="cover_url" value="{{ $coverUrl ?? '' }}">

                        @if(in_array($comic['title'], $userComics))
                            <p class="bg-green-500 py-1 px-2 rounded font-bold text-center">In collectie</p>
                        @else
                            <button type="submit" class="w-full bg-blue-600 text-black py-1 px-2 rounded hover:bg-blue-700 transition">Toevoegen</button>
                        @endif
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const forms = document.querySelectorAll('.favorite-form');

        forms.forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault(); // Prevent the default form submission

                const formData = new FormData(form);
                const action = form.getAttribute('action');

                try {
                    const response = await fetch(action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    });

                    if (response.ok) {
                        const result = await response.json();
                        // Update the UI dynamically (e.g., mark as "In collectie")
                        form.innerHTML = '<p class="bg-green-500 py-1 px-2 rounded font-bold text-center">In collectie</p>';
                    } else {
                        console.error('Failed to add to favorites');
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>


