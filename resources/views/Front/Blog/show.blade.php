@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image" style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h1 class="card-title">{{ $blog->titre }}</h1>
            <p class="text-muted">{{ $blog->date->format('F d, Y') }}</p>
            <p class="card-text">{{ $blog->content }}</p>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="mt-5">
        <h4>Comments</h4>

        <!-- Display Comments -->
        @foreach ($blog->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="mb-0">{{ $comment->content }}</p>
                    <small class="text-muted">Posted by {{ $comment->user->name }} on {{ $comment->created_at->format('F d, Y') }}</small>

                    @if(auth()->id() === $comment->user_id)
                        <!-- Delete Comment Button -->
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

        <!-- Add Comment Form -->

        <form action="{{ route('comments.store', $blog->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" placeholder="Add a comment..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    
    </div>

    <div class="mt-5">
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to Blogs</a>
    </div>
</div>
@endsection
