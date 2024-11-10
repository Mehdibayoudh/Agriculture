<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ $route }}" method="POST" class=" contact-one__form" enctype="multipart/form-data">
        @csrf
        @if($wishlist->exists)
        @method('PUT')
        @endif

        <div class="row" style="align-items: flex-end;">
            <!-- Title -->
            <div class="col-md-6">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" style="padding-left: 0; padding-right: 0; border: 1px solid #ced4da; background-color: white;"
                    value="{{ old('name', $wishlist->name) }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit button -->
            <button type="submit" class="thm-btn" style=" width: 46%; height: 61px; margin: 15px;">
                {{ isset($wishlist->id) ? 'Update Wishlist' : 'Create Wishlist' }}
            </button>
    </form>





</body>

</html>