@extends('layouts.app')

@section('title', 'Comic Bewerken')

@section('content')
    <h1>Comic Bewerken</h1>

    <form action="{{ route('comics.update', $comic) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Titel</label>
        <input type="text" name="title" value="{{ old('title', $comic->title) }}" required>

        <label>Auteur/Tekenaar</label>
        <input type="text" name="author" value="{{ old('author', $comic->author) }}" required>

        <label>Serie</label>
        <input type="text" name="series" value="{{ old('series', $comic->series) }}">

        <label>Nummer</label>
        <input type="number" name="number" value="{{ old('number', $comic->number) }}">

        <label>Genre</label>
        <input type="text" name="genre" value="{{ old('genre', $comic->genre) }}">

        <label>Status</label>
        <select name="status" required>
            <option value="gelezen" {{ $comic->status == 'gelezen' ? 'selected' : '' }}>Gelezen</option>
            <option value="wishlist" {{ $comic->status == 'wishlist' ? 'selected' : '' }}>Wishlist</option>
            <option value="in_bezit" {{ $comic->status == 'in_bezit' ? 'selected' : '' }}>In bezit</option>
        </select>

        <button type="submit">💾 Opslaan</button>
    </form>
@endsection
