<form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form">
    @csrf
    @if(isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="input-group input-group-outline mb-3">
         <input placeholder="Name" type="text" name="name" class="form-control" id="name" value="{{ old('name', $sponsor->name) }}" required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="input-group input-group-outline mb-3">
         <input placeholder="Industry" type="text" name="industry" class="form-control" id="industry" value="{{ old('industry', $sponsor->industry) }}" required>
        @error('industry')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="input-group input-group-outline mb-3">
         <input placeholder="phone" type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $sponsor->phone) }}" required>
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-check form-check-info text-start ps-0">
        <input class="form-check-input" type="checkbox" value="" id="terms" required>
        <label class="form-check-label" for="terms">
            I agree to the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
        </label>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save Sponsor</button>
    </div>
</form>
