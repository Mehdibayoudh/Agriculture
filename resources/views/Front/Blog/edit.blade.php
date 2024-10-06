@extends('layouts.app')

@section('content')
    <div class="container m-4" style="
        max-width: 100%;
        margin: 0 auto;
        background-color: rgba(144, 238, 144, 0.5);
        padding: 20px;
        border-radius: 8px;">
        <h2>Edit Blog</h2>
        @include('Front.Blog.form', ['blog' => $blog, 'route' => route('blogs.update', $blog->id)])
    </div>
@endsection
