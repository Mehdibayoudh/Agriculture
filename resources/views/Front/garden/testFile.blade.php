<form action="{{ route('jardins.store') }}" method="POST" enctype="multipart/form-data"> <!-- Changez ici -->
    @csrf

    <div class="mb-3">
        <label for="image" class="form-label">Image du poste</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
    </div>


    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
