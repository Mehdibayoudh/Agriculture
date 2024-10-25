<!DOCTYPE html>
<html lang="en">
<body>
<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Billing Details</h3>
                <div class="card-body">
                    <form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form">
                        @csrf
                        @if($event->exists)
                            @method('PUT') <!-- Use PUT for updates -->
                        @endif

                        <div class="input-group input-group-outline mb-3">
                             <input type="text" name="titre" placeholder="Event Title" class="form-control" value="{{ old('titre', $event->titre) }}" required>
                            @error('titre')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group input-group-outline mb-3">
                             <textarea name="description" class="form-control"  placeholder="Event Description" required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group input-group-outline mb-3">
                             <input type="datetime-local" name="date" class="form-control" placeholder="Event Date" value="{{ old('date', $event->date ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group input-group-outline mb-3">
                             <input type="text" name="localisation" placeholder="Event Location" class="form-control" value="{{ old('localisation', $event->localisation) }}" required>
                            @error('localisation')
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
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save Event</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.checkout-page -->
</body>
</html>
