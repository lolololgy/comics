<x-guest-layout>
    <div class="min-h-screen bg-yellow-100 flex flex-col items-center justify-center p-6 comic-font">
        <div class="text-center">
            <img src="{{ asset('images/comic-logo.png') }}" alt="Comic Collectie" class="mx-auto w-40 h-auto mb-6">

            <h1 class="text-4xl sm:text-5xl font-extrabold text-red-600 drop-shadow-lg">
                📚 Welkom bij Comic Collectie!
            </h1>
            <p class="mt-4 text-lg text-gray-800 max-w-xl mx-auto">
                Duik in een wereld van stripboeken, helden en verhalen. Ontdek, verzamel en deel jouw favoriete comics!
            </p>

            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-black font-bold rounded shadow-lg transition">
                    🦸 Inloggen
                </a>
                <a href="{{ route('register') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-black font-bold rounded shadow-lg transition">
                    ✍️ Registreren
                </a>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

        .comic-font {
            font-family: 'Bangers', cursive;
        }
    </style>
</x-guest-layout>
