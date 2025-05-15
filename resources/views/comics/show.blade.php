@extends('layouts.app')

@section('title', $comic->title)

@section('content')
    <h1>{{ $comic->title }}</h1>

    <div class="comic-card">
        <p><strong>Auteur/Tekenaar:</strong> {{ $comic->author }}</p>
        <p><strong>Serie:</strong> {{ $comic->series }}</p>
        <p><strong>Nummer:</strong> {{ $comic->number }}</p>
        <p><strong>Genre:</strong> {{ $comic->genre }}</p>
        <p><strong>Status:</strong> {{ $comic->status }}</p>

        @if($comic->cover_path)
            <div>
                <img src="{{ asset('storage/' . $comic->cover_path) }}" alt="Cover van {{ $comic->title }}" width="200">
            </div>
        @endif
    </div>

    <a href="{{ route('comics.edit', $comic) }}">✏️ Bewerken</a>
    <a href="{{ route('comics.index') }}">⬅️ Terug naar overzicht</a>
@endsection
