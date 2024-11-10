<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        // Validate the comment data
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Create and save the comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = 1; // Assuming the user is logged in
        $comment->blog_id = $blog->id;

        $comment->save();

        // Redirect back to the blog page with success message
        return redirect()->route('blogs.show', $blog->id)->with('success', 'Comment added successfully.');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        // Check if the user is authorized to delete the comment
        if (1 !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
