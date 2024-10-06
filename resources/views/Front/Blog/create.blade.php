@extends('layouts.app')

@section('content')
<div class="container m-4" style="
        max-width: 750%;
        background-color: rgba(144, 238, 144, 0.3);
        padding: 20px;
        border-radius: 8px;">
        <h2>Create New Blog</h2>
        @include('Front.Blog.form', ['blog' => new \App\Models\Blog, 'route' => route('blogs.store')])
    </div>
@endsection
