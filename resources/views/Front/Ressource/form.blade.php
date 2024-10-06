<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ninetheme.com/themes/html-templates/oganik/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 12:18:36 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<body>

    <form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form">
        @csrf
        @if($ressource->exists)
        @method('PUT')
        @endif


        <div class="row">
            <!-- Title -->
            <div class="col-md-6">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required style="padding-left: 0; padding-right: 0;">
                @error('titre')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Type -->
            <div class="col-md-6">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required style="padding-left: 0; padding-right: 0;">
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Disponibilité -->
            <div class="col-md-6">
                <label for="disponibilité">Disponibilité</label>
                <input type="text" name="disponibilité" id="disponibilité" class="form-control" value="{{ old('disponibilité') }}" required style="padding-left: 0; padding-right: 0;">
                @error('disponibilité')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" style="padding-left: 0; padding-right: 0; height: auto;">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div class="col-md-6">
                <label for="image">Image (optional)</label>
                <input type="file" name="image" id="image" class="form-control-file" style="padding-left: 0; padding-right: 0; padding-bottom: 30px;">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="thm-btn" style="width: 100%;">
            {{ isset($ressource->id) ? 'Update Ressource' : 'Create Ressource' }}
        </button>
    </form>




</body>

</html>