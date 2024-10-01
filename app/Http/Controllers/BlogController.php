<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('Front.Blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created blog in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'content' => 'required|string',
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog in the database.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'content' => 'required|string',
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        $blog->update($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from the database.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
