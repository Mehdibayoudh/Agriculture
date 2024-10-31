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
                                    <label for="photo" class="form-label">Image du jardin</label>
                                    <input type="file" class="form-control" id="photo" name="photo" onchange="uploadImage(event)">
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

                        <!-- Garden Desc -->
                        <div class="col-md-12">
                            <input type="text" id="description" name="description" placeholder="Garden description" value="{{ old('description', $jardin->description) }}" required>
                            @error('description')
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
                            <select name="type" id="type" class="form-control" required>
                                @foreach(\App\Models\Jardin::GARDEN_TYPES as $type)
                                    <option value="{{ $type }}" {{ old('type', $jardin->type ?? '') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
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
                            <input readonly  type="text" name="utilisateur_id" placeholder="User ID (Garden Owner)" value="{{ $conectedJardinier }}" required>
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


<script>
    async function uploadImage(event) {
        const file = event.target.files[0];
        if (file) {
            const formData = new FormData();
            formData.append('image', file);

            try {
                const response = await fetch("{{ route('generate.description') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData,
                });

                const data = await response.json();
                if (data.description) {
                    document.getElementById('description').value = data.description;
                } else {
                    console.error('No description returned');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    }
</script>
</body>
</html>
