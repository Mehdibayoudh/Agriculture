<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<body>

    <form action="{{ $route }}" method="POST" class=" contact-one__form" enctype="multipart/form-data">
        @csrf
        @if($wishlist->exists)
        @method('PUT')
        @endif

        <div class="row">
            <!-- Title -->
            <div class="col-md-6">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" style="padding-left: 0; padding-right: 0; border: 1px solid #ced4da; background-color: white;"
                    value="{{ old('name', $wishlist->name) }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit button -->
            <button type="submit" class="thm-btn" style="width: 100%;">
                {{ isset($wishlist->id) ? 'Update Wishlist' : 'Create Wishlist' }}
            </button>
    </form>





</body>

</html>