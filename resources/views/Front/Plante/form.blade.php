<form action="{{ $route }}" method="POST">
    @csrf
    @if (isset($plante->id))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $plante->nom ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $plante->type ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="besoins">Besoins</label>
        <textarea class="form-control" id="besoins" name="besoins" rows="3" required>{{ old('besoins', $plante->besoins ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="jardin_id">Jardin</label>
        <select class="form-control" id="jardin_id" name="jardin_id" required>
            @foreach ($jardins as $jardin)
                <option value="{{ $jardin->id }}" {{ (isset($plante) && $jardin->id == $plante->jardin_id) ? 'selected' : '' }}>
                    {{ $jardin->nom }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($plante->id) ? 'Update Plante' : 'Create Plante' }}
    </button>
</form>
