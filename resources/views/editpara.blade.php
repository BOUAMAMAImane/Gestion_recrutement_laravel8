<form action="{{ route('paragraphs.update', $paragraph->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" required>{{ $paragraph->content }}</textarea>
    </div>
    <button type="submit">Enregistrer les modifications</button>
</form>
