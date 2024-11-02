<div class="row">
    <div class="col-lg-6">
        @if (isset($plante->id))
            <h3>Details de la plante {{ $plante->nom }} :</h3>
        @else
            <h3>Ajouter une plante :</h3>
        @endif

        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($plante->id))
                @method('PUT')
            @endif

            <div class="form-group mt-4">
                <div class="d-flex " style="align-items: baseline;">
                    <label class="text-dark font-weight-bold" for="nom">Nom</label>
                    @error('nom')
                        <div style="margin-bottom: 0; margin-left: 10px; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px; padding-right: 10px; " >{{ $message }}</span>
                        </div>
                    @enderror

                </div>
                
                <input type="text" class="form-control mb-3" id="nom" name="nom"
                    value="{{ old('nom', $plante->nom ?? '') }}">
                    
            </div>

            <div class="form-group">
                <div class="d-flex " style="align-items: baseline;">
                    <label class="text-dark font-weight-bold" for="categorie_id">Type</label>
                    @error('categorie_id')
                        <div style="margin-bottom: 0; margin-left: 10px; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px; padding-right: 10px; " >{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                
                <select class="form-control mb-3" id="categorie_id" name="categorie_id">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"
                            {{ isset($plante) && $categorie->id == $plante->categorie_id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group ">
                <div class="d-flex " style="align-items: baseline;">
                    <label for="description" class="text-dark font-weight-bold">Description </label>
                    @error('description')
                <div style="margin-bottom: 0; margin-left: 10px; font-size: 12px; padding: 0; display: flex; align-items: center;"
                    class="alert alert-danger" role="alert">
                    <span style="padding-left: 10px; padding-right: 10px;" >{{ $message }}</span>
                </div>
            @enderror
                </div>
                
                
                <textarea style="margin-bottom: 30px" class="form-control " id="description" name="description">{{ old('description', $plante->description ?? '') }}</textarea>
                
            </div>

            <div class="form-group">
                <div class="d-flex " style="align-items: baseline;">
                    <label class="text-dark font-weight-bold" for="besoins_eau">Besoins en eau ( en L/Jour )</label>
                    @error('besoins_eau')
                    <div style="margin-bottom: 0; margin-left: 10px; font-size: 12px; padding: 0; display: flex; align-items: center;"
                        class="alert alert-danger" role="alert">
                        <span style="padding-left: 10px; padding-right: 10px;" >{{ $message }}</span>
                    </div>
                @enderror

                </div>
                <input type="number" class="form-control mb-3" id="besoins_eau"
                    name="besoins_eau" value="{{ old('besoins_eau', $plante->besoins_eau ?? '') }}">
                    
            </div>

            <div class="form-group">
                <div class="d-flex " style="align-items: baseline;">
                    <label for="image" class="text-dark font-weight-bold">Image de la plante</label>
                    @error('image')
                    <div style="margin-bottom: 0; margin-left: 10px;font-size: 12px; padding: 0; display: flex; align-items: center;"
                        class="alert alert-danger" role="alert">
                        <span style="padding-left: 10px; padding-right: 10px;" >{{ $message }}</span>
                    </div>
                @enderror
                </div>
                <input style="padding: 0; height: fit-content;" type="file" name="image" placeholder="Image URL" class="form-control mb-3"
                    value="{{ old('image', $plante->image) }}" onchange="previewImage(event)">

            </div>

            <div id="imagePreview" style="{{ $plante->image ? '' : 'display: none;' }}">
                <img src="{{ URL::asset('/uploads/' . $plante->image) }}" id="preview" src=""
                    alt="Aperçu de l'image" style="border-radius: 20%; height: 100px; width: 100px;">
            </div>


            <input type="hidden" name="jardin_id" value="{{ $jardin->id }}">

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    {{ isset($plante->id) ? 'Enregistrer Plante' : 'Ajouter Plante' }}
                </button>
            </div>
        </form>
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const preview = document.getElementById('preview');

        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            imagePreview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    }
</script>
