@extends('layouts.app')

@section('content')
<body>
<div class="preloader">
    <img class="preloader__image" width="55" src="assets/images/loader.png" alt="" />
</div>
<!-- /.preloader -->
<div class="page-wrapper">

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2>Blogs</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><span>Blogs</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="products-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="product-sidebar">
                        <div class="product-sidebar__single product-sidebar__search-widget">
                            <form method="GET" action="{{ route('blogs.search') }}">
                                <input type="text" placeholder="Search" name="search" value="{{ request('search') }}">
                                <button class="organik-icon-magnifying-glass" type="submit"></button>
                            </form>
                        </div><!-- /.product-sidebar__single -->
                        <div class="product-sidebar__single">
                            <h3>Categories</h3>
                            <ul class="list-unstyled product-sidebar__links">
                                <li><a href="#">Lifestyle <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Travel <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Health <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Food <i class="fa fa-angle-right"></i></a></li>
                            </ul><!-- /.list-unstyled product-sidebar__links -->
                        </div><!-- /.product-sidebar__single -->
                    </div><!-- /.product-sidebar -->
                </div><!-- /.col-sm-12 col-md-12 col-lg-3 -->

                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="product-sorter">
                        <p>Showing {{ count($blogs) }} results</p>
                    </div><!-- /.product-sorter -->
                   

                    <div class="row">
    @foreach($blogs as $blog)
        <div class="col-md-6 col-lg-4 mb-4"> <!-- Each blog card takes 1/3rd of the row on large screens -->
        <div class="product-card border rounded shadow-sm p-3 d-flex flex-column" style="height: 100%;">
                <!-- Blog Image Section -->
                <div class="product-card__image">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->titre }}" style="width: 100%; height: auto;">
                    @else
                        <img src="assets/images/products/default-image.jpg" alt="Default Image" style="width: 100%; height: auto;">
                    @endif
                </div><!-- /.product-card__image -->

                <!-- Blog Content Section -->
                <div class="product-card__content">
                    <div style="display: flex; flex-direction: column;">
                        <!-- Blog Title and Content -->
                        <div>
                            <div class="product-card__left">
                                <h3><a href="blogs/{{ $blog->id }}">{{ $blog->titre }}</a></h3>
                                <p>{{ Str::limit($blog->content, 100) }}</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.product-card__content -->

                <!-- Action Buttons for Blog (Edit & Delete) -->
                @if (auth()->id() === $blog->utilisateur_id) <!-- Check if the authenticated user is the owner -->
                <div class="product-card__actions d-flex justify-content-end mt-auto">
                    <a href="blogs/{{ $blog->id }}/edit"  title="Edit">
                        <i class="fa fa-edit pr-1"></i> <!-- FontAwesome Edit Icon -->
                    </a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');" style="display:inline;">                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete" style="border: none; background: none;">
        <i class="fa fa-trash pr-2"></i> <!-- FontAwesome Trash Icon -->
    </button>
                    </form>
                </div><!-- /.product-card__actions -->
                @endif

            </div><!-- /.product-card -->
        </div><!-- /.col -->
    @endforeach
</div><!-- /.row -->





                    <div class="text-center mt-4">
                        <a href="blogs/create" class="thm-btn products__load-more">Add Blog</a>
                    </div>
                </div><!-- /.col-sm-12 col-md-12 col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.products-page -->

</div><!-- /.page-wrapper -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

</body>
@endsection
