<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ninetheme.com/themes/html-templates/oganik/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 12:18:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<body>
<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Billing Details</h3>
                <form action="{{ $route }}" method="POST" class="contact-form-validated contact-one__form">
                    @csrf
                    @if($event->exists)
                        @method('PUT') <!-- Use PUT for updates -->
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="titre" placeholder="Event Title" value="{{ old('titre', $event->titre) }}" required>
                            @error('titre')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <textarea name="description" placeholder="Event Description" required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="datetime-local" name="date" placeholder="Event Date" value="{{ old('date', $event->date ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="text" name="localisation" placeholder="Event Location" value="{{ old('localisation', $event->localisation) }}" required>
                            @error('localisation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="thm-btn">Save Event</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.checkout-page -->

</body>
</html>
