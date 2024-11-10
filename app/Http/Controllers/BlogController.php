<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function indexA()
    {
        $blogs = Blog::all();
        return view('Back.Blog.index', compact('blogs'));
    }

    public function MyBlogs()
{
    $blogs = Blog::where('utilisateur_id', Auth::id())->get();
     // Convert the collection to an array for easier reading
    return view('Front.Blog.index', compact('blogs'));
}

public function search(Request $request)
{
    // Get the search query from the request
    $searchQuery = $request->input('search');

    // Perform the search on the blog title and content (or any other relevant columns)
    $blogs = Blog::where('titre', 'LIKE', '%' . $searchQuery . '%')
        ->orWhere('content', 'LIKE', '%' . $searchQuery . '%')
        ->get();

    // Return the view with the search results
    return view('Front.Blog.index', compact('blogs'));
}



    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('Front.Blog.create');
    }

    /**
     * Store a newly created blog in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = new Blog();
        $blog->titre = $request->input('titre');
        $blog->content = $request->input('content');
        $blog->utilisateur_id = Auth::id();
        $blog->date = now(); // Store the current date and time in the 'date' field

        // Handle file upload
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs/images', 'public');
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }




    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        return view('Front.Blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        return view('Front.Blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog in the database.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Update the blog with the validated data
        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');;
    }

    /**
     * Remove the specified blog from the database.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function destroyA(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

}
