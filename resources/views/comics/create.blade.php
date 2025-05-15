<form action="{{ route('comics.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Titel" required>
    <input type="text" name="author" placeholder="Auteur/Tekenaar" required>
    <input type="text" name="series" placeholder="Serie">
    <input type="number" name="number" placeholder="Nummer">
    <input type="text" name="genre" placeholder="Genre">
    <select name="status" required>
        <option value="gelezen">Gelezen</option>
        <option value="wishlist">Wishlist</option>
        <option value="in_bezit">In bezit</option>
    </select>
    <button type="submit">Opslaan</button>
</form>
