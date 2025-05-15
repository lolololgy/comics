@extends('layouts.app')

@section('title', 'Mijn Comic Collectie')

@section('content')
    <h1>Mijn Comic Collectie</h1>

    <a href="{{ route('comics.create') }}">➕ Nieuwe comic toevoegen</a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @foreach ($comics as $comic)
        <div class="comic-card">
            <h2><a href="{{ route('comics.show', $comic) }}">{{ $comic->title }}</a></h2>
            <p>{{ $comic->author }} | {{ $comic->series }} #{{ $comic->number }}</p>
            <p>Status: {{ $comic->status }}</p>
            <a href="{{ route('comics.edit', $comic) }}">✏️ Bewerken</a>
            <form action="{{ route('comics.destroy', $comic) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">🗑️ Verwijderen</button>
            </form>
        </div>
    @endforeach
@endsection
