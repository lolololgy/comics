@extends('layouts.app')

@section('title', 'Nieuwe Comic Toevoegen')

@section('content')
    <h1>Nieuwe Comic Toevoegen</h1>

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf

        <label>Titel</label>
        <input type="text" name="title" required>

        <label>Auteur/Tekenaar</label>
        <input type="text" name="author" required>

        <label>Serie</label>
        <input type="text" name="series">

        <label>Nummer</label>
        <input type="number" name="number">

        <label>Genre</label>
        <input type="text" name="genre">

        <label>Status</label>
        <select name="status" required>
            <option value="gelezen">Gelezen</option>
            <option value="wishlist">Wishlist</option>
            <option value="in_bezit">In bezit</option>
        </select>

        <button type="submit">💾 Opslaan</button>
    </form>
@endsection
