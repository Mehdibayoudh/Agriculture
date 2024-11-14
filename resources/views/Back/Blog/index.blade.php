@extends('layouts_Admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <!-- Add Blog Button -->
                <div class="d-flex justify-content-end"></div>
                <br>
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" style="background: #60be74">
                        <h6 class="text-white text-capitalize ps-3">Blogs Table</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $blog->titre }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ Str::limit($blog->content, 50) }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $blog->date }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border:none; background:none;" class="text-danger font-weight-bold text-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        <button onclick="toggleComments({{ $blog->id }})" class="btn btn-sm btn-primary pt-1 mt-2">View Comments</button>

                                    </td>
                                </tr>

                                <!-- Comments Table for Each Blog -->
                                <tr id="comments-{{ $blog->id }}" style="display: none;">
                                    <td colspan="4">
                                        <div class="card my-3">
                                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" style="background: #60be30">
                        <h6 class="text-white text-capitalize ps-3">Comments for {{ $blog->titre }}</h6>
                    </div>
                                            <div class="card-body  px-0 pb-2">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Content</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($blog->comments as $comment)
                                                        <tr>
                                                            <td class="text-xs font-weight-bold mb-0">{{ $comment->content }}</td>
                                                            <td class="text-xs font-weight-bold mb-0">{{ $comment->user->name }}</td>
                                                            <td class="text-xs font-weight-bold mb-0">{{ $comment->created_at->format('Y-m-d') }}</td>
                                                            <td>
                                                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" style="border:none; background:none;" class="text-danger font-weight-bold text-xs">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleComments(blogId) {
            const commentsRow = document.getElementById('comments-' + blogId);
            commentsRow.style.display = commentsRow.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
@endsection
