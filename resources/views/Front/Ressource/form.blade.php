<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<body>

    <form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form" enctype="multipart/form-data">
        @csrf
        @if($ressource->exists)
        @method('PUT')
        @endif

        <div class="row">
            <!-- Title -->
            <div class="col-md-6">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" style="padding-left: 0; padding-right: 0; border: 1px solid #ced4da; background-color: white;"
                    value="{{ old('titre', $ressource->titre) }}" required>
                @error('titre')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Type -->
            <!-- Type Dropdown -->
            <div class="col-md-6">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control" style="padding-left: 0; padding-right: 0; height: 60px;" required>
                    <option value="" disabled>Select Type</option>
                    <option value="naturelle" {{ old('type', $ressource->type) == 'naturelle' ? 'selected' : '' }}>naturelle</option>
                    <option value="materielle" {{ old('type', $ressource->type) == 'materielle' ? 'selected' : '' }}>materielle</option>
                </select>
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Disponibilité Dropdown -->
            <div class="col-md-6">
                <label for="disponibilité">Disponibilité</label>
                <select name="disponibilité" id="disponibilité" class="form-control" style="padding-left: 0; padding-right: 0; height: 60px;" required>
                    <option value="" disabled>Select Availability</option>
                    <option value="disponible" {{ old('disponibilité', $ressource->disponibilité) == 'disponible' ? 'selected' : '' }}>disponible</option>
                    <option value="indisponible" {{ old('disponibilité', $ressource->disponibilité) == 'indisponible' ? 'selected' : '' }}>indisponible</option>
                    <option value="reservé" {{ old('disponibilité', $ressource->disponibilité) == 'reservé' ? 'selected' : '' }}>reservé</option>
                </select>
                @error('disponibilité')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Description -->
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" style="padding-left: 0; padding-right: 0; height: auto;  border: 1px solid #ced4da; background-color: white;">{{ old('description', $ressource->description) }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div class="col-md-6">
                <label for="image">Image (optional)</label>
                <input type="file" name="image" id="image" class="form-control-file" style=" padding-left: 0; padding-right: 0; padding-bottom: 30px;">
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