<!DOCTYPE html>
<html lang="en">


<body>

    <div class="container mt-5">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($blog->id))
                @method('PUT')
            @endif

            <!-- Blog Title -->
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                       value="{{ old('titre', $blog->titre ?? '') }}" >
                @error('titre')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Blog Content with Emoji Picker and Font Style -->
            <div class="form-group">
                <label for="content">Content</label>
                <div class="d-flex align-items-center mb-2">
                <textarea class="form-control" id="content" name="content" rows="5" style="font-family: Arial;">{{ old('content', $blog->content ?? '') }}</textarea>
                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Blog Image -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if (isset($blog->image))
                    <p>Current Image: <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100"></p>
                @endif
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Hidden User ID (for connected user) -->
            <input type="hidden" name="utilisateur_id" value="{{ auth()->id() }}">

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success btn-block">
                {{ isset($blog->id) ? 'Update Blog' : 'Create Blog' }}
            </button>
        </form>
    </div>

</body>
</html>
