<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        // Filter the content for bad words using the BadWordFilterController
        $badWordFilterController = new BadWordFilterController();
        $response = $badWordFilterController->filterBadWords($request);

        // If there's no filtered content returned, use the original content
        $filteredContent = $response->getData()->filteredContent ?? $request->input('content');

        // Create and save the comment
        $comment = new Comment();
        $comment->content = $filteredContent; // Save the filtered content
        $comment->user_id = Auth::id(); // Assuming the user is logged in
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
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function destroyA(Comment $comment)
    {
        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function edit(Comment $comment)
{
    // Ensure that the logged-in user is the owner of the comment
    if (Auth::id() !== $comment->user_id) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    // Show the edit form with the comment data
    return view('comments.edit', compact('comment'));
}

public function update(Request $request, Comment $comment)
{
    // Validate the comment content
    $request->validate([
        'content' => 'required|string|max:500',
    ]);

    // Ensure that the logged-in user is the owner of the comment
    if (Auth::id() !== $comment->user_id) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    // Update the comment
    $comment->content = $request->input('content');
    $comment->save();

    // Redirect back with a success message
    return redirect()->route('blogs.show', $comment->blog_id)->with('success', 'Comment updated successfully.');
}

}
