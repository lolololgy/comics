<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Andere lezers
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc list-inside space-y-2">
                        @foreach($users as $user)
                            <li>
                                <a class="text-blue-600 hover:underline" href="{{ route('readers.show', $user) }}">
                                    {{ $user->name }}
                                </a>
                                <span class="text-gray-600">({{ $user->comics_count }} comics)</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('comics.index') }}" class="inline-block mt-6 text-sm text-gray-700 hover:text-gray-900">
                        ⬅️ Terug naar mijn collectie
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
