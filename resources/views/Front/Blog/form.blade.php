<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($blog->id))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $blog->titre ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $blog->content ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @if (isset($blog->image))
            <p>Current Image: <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100"></p>
        @endif
    </div>

    <input type="hidden" name="utilisateur_id" value="1"> <!-- Adjust the user ID as needed -->

    <button type="submit" class="btn btn-success">
        {{ isset($blog->id) ? 'Update Blog' : 'Create Blog' }}
    </button>
</form>
