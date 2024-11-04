<div class="row">
    <div class="col-lg-6">
        @if (isset($planteCategorie->id))
            <h3>Details du categorie {{ $planteCategorie->nom }} :</h3>
        @else
            <h3>Ajouter une categorie :</h3>
        @endif

        <div class="card-body">
            <form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form"
                enctype="multipart/form-data">
                @csrf
                @if (isset($planteCategorie->id))
                    @method('PUT') <!-- Use PUT for updates -->
                @endif

                <label for="nom" class="text-dark font-weight-bold">Nom :</label>
                <div class="d-flex flex-row gap-3">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" id="nom" name="nom" class="form-control"
                            value="{{ $planteCategorie->nom }}">
                    </div>
                    @error('nom')
                        <div style="width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label for="description" class="text-dark font-weight-bold">Description :</label>
                <div class="d-flex flex-row gap-3">
                    <div data-mdb-input-init class="input-group input-group-outline mb-3">
                        <textarea id="description" name="description" class="form-control">{{ old('description', $planteCategorie->description) }}</textarea>

                    </div>
                    @error('description')
                        <div style=" width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label for="type_sol" class="text-dark font-weight-bold">Type du sol :</label>
                <div class="d-flex flex-row gap-3">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" id="type_sol" name="type_sol" class="form-control"
                            value="{{ old('type_sol', $planteCategorie->type_sol) }}">

                    </div>
                    @error('type_sol')
                        <div style="width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label for="cycle_de_vie" class="text-dark font-weight-bold">Cycle de vie :</label>
                <div class="d-flex flex-row gap-3">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" id="cycle_de_vie" name="cycle_de_vie" class="form-control"
                            value="{{ old('cycle_de_vie', $planteCategorie->cycle_de_vie) }}">

                    </div>
                    @error('cycle_de_vie')
                        <div style="width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label for="utilisation" class="text-dark font-weight-bold">Utilisation :</label>
                <div class="d-flex flex-row gap-3">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" id="utilisation" name="utilisation" class="form-control"
                            value="{{ old('utilisation', $planteCategorie->utilisation) }}">

                    </div>
                    @error('utilisation')
                        <div style="width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label for="maladies_courantes" class="text-dark font-weight-bold">Maladies communes :</label>
                <div class="d-flex flex-row gap-3">
                    <div class="input-group input-group-outline mb-3">
                        <textarea id="maladies_courantes" name="maladies_courantes" class="form-control">{{ old('maladies_courantes', $planteCategorie->maladies_courantes) }}</textarea>
                    </div>
                    @error('maladies_courantes')
                        <div style="width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <label for="image" class="text-dark font-weight-bold">Image de la catégorie :</label>
                <div class="d-flex flex-row gap-3">
                    <div class="input-group input-group-outline mb-3">
                        <input type="file" id="image" name="image" class="form-control" onchange="previewImage(event)">
                    </div>
                    @error('image')
                        <div style="width: 70%; font-size: 12px; padding: 0; display: flex; align-items: center;"
                            class="alert alert-danger" role="alert">
                            <span style="padding-left: 10px " class="text-white">{{ $message }}</span>
                        </div>
                    @enderror
                </div>



                <div class="text-center">
                    <button type="submit" class="btn btn-lg bg-gradient-primary mt-4 mb-0">Enregistrer la Categorie</button>
                </div>
            </form>
        </div>
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

