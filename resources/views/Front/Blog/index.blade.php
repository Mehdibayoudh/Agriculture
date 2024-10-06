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
                            <form action="#">
                                <input type="text" placeholder="Search">
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
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="product-card border rounded shadow-sm p-3 d-flex flex-column" style="height: 100%;">
                <div class="product-card__image mb-3">
                    @if ($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="width: 100%; height: auto;">
                    @else
                        <img src="path/to/default/image.jpg" alt="Default Image" style="width: 100%; height: auto;">
                    @endif
                </div><!-- /.product-card__image -->

                <div class="product-card__content p-3 flex-grow-1">
    <div class="d-flex flex-column">
        <!-- Blog Title -->
        <h3 class="product-title mb-2">
            <a href="blogs/{{ $blog->id }}">{{ $blog->titre }}</a>
        </h3>

        <!-- Blog Content -->
        <p class="product-description mb-3">{{ Str::limit($blog->content, 100) }}</p>
    </div>
</div>
<!-- /.product-card__content -->

                <div class="product-card__actions d-flex justify-content-end mt-auto">
                    <a href="blogs/{{ $blog->id }}/edit"  title="Edit">
                        <i class="fa fa-edit pr-1"></i> <!-- FontAwesome Edit Icon -->
                    </a>
                    <form action="blogs/{{ $blog->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete" style="border: none; background: none;">
        <i class="fa fa-trash"></i> <!-- FontAwesome Trash Icon -->
    </button>
                    </form>
                </div><!-- /.product-card__actions -->
            </div><!-- /.product-card -->
        </div><!-- /.col-md-6 col-lg-4 -->
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
