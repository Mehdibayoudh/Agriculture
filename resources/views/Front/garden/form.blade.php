<!DOCTYPE html>
<html lang="en">
<body>
<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Garden Details</h3>
                <form action="{{ $route }}" method="POST" class="contact-one__form" enctype="multipart/form-data">
                    @csrf
                    @if($jardin->exists)
                        @method('PUT') <!-- Use PUT for updates -->
                    @endif


                    <div class="row">
                        <!-- Image Upload Field -->

                        @if(!$jardin->exists)
                            <!-- If the garden is being created (new garden, no image yet) -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Image du poste</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>
                        @else
                            <!-- If the garden already exists (editing), show the current image and option to upload a new one -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Image actuelle</label>
                                    @if($jardin->photo)
                                        <div class="current-image mb-3">
                                            <img src="{{ asset('storage/' . $jardin->photo) }}" alt="Image de {{ $jardin->nom }}" style="max-width: 400px;">
                                        </div>
                                    @else
                                        <p>Aucune image disponible.</p>
                                    @endif
                                </div>
                            </div>
                        @endif


                        <!-- Garden Name -->
                        <div class="col-md-12">
                            <input type="text" name="nom" placeholder="Garden Name" value="{{ old('nom', $jardin->nom) }}" required>
                            @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Garden Location -->
                        <div class="col-md-12">
                            <input type="text" name="localisation" placeholder="Garden Location" value="{{ old('localisation', $jardin->localisation) }}" required>
                            @error('localisation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Garden Type -->
                        <div class="col-md-12">
                            <input type="text" name="type" placeholder="Garden Type" value="{{ old('type', $jardin->type) }}" required>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Garden Surface -->
                        <div class="col-md-12">
                            <input type="number" name="surface" placeholder="Garden Surface (in square meters)" value="{{ old('surface', $jardin->surface) }}" required>
                            @error('surface')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Utilisateur ID -->
                        <div class="col-md-12">
                            <input type="text" name="utilisateur_id" placeholder="User ID (Garden Owner)" value="{{ $conectedJardinier }}" required>
                            @error('utilisateur_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="col-md-12">
                            <button type="submit" class="thm-btn">Save Garden</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.checkout-page -->
</body>
</html>
