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
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <small class="text-muted">
                        Posted by {{ $comment->user->name }} on {{ $comment->created_at->format('F d, Y') }}
                    </small>

                    @if(auth()->id() === $comment->user_id)
                        <!-- Edit Comment Button -->
                        <a href="#" data-toggle="modal" data-target="#editCommentModal{{ $comment->id }}" class="text-warning ml-1">
                            <i class="fa fa-edit"></i>
                        </a>

                        <!-- Delete Comment Button -->
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none; background:none; margin-left: 2px;" class="text-danger font-weight-bold text-xs">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Edit Comment Modal -->
        <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentModalLabel{{ $comment->id }}">Edit Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3">{{ $comment->content }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Add Comment Form -->
<form action="{{ route('comments.store', $blog->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <textarea name="content" class="form-control" rows="3" placeholder="Add a comment..." ></textarea>
    </div>
    <button type="submit" class="btn btn-success">Post Comment</button>
</form>

    </div>

    <div class="mt-5">
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to Blogs</a>
    </div>
</div>



@endsection
