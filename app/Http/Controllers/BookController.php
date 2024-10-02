<?php
// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('crud', ['books' => $books]);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        // 'trending' => 'nullable|boolean',
        // 'classic' => 'nullable|boolean',
    ]);

    
// Find the book and update it
$book = Book::findOrFail($id);
$book->update([
    'title' => $request->input('title'),
    'author' => $request->input('author'),
    'description' => $request->input('description'),
    'price' => $request->input('price'),
    'stock' => $request->input('stock'),
    'trending' => $request->boolean('trending'),  // Use boolean() to handle true/false properly
    'classic' => $request->boolean('classic'),    // Same here for 'classic'
]);

    return redirect()->back()->with('success', 'Book updated successfully!');
}


    public function show($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->back()->with('success', 'Book deleted successfully!');
}


public function store(Request $request)
{
    $genres = ['Action', 'Adventure', 'Romance', 'Fantasy', 'Science Fiction', 
    'Horror', 'Mystery', 'Thriller', 'Slice of Life', 'Comedy', 
    'Historical', 'Sports', 'Isekai', 'Seinen', 'Josei', 
    'Superhero', 'Anthology'];
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'trending' => 'sometimes|boolean',
        'classic' => 'sometimes|boolean',
        'genre' => 'nullable|string|in:' . implode(',', $genres),
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('cover_images', 'public');
    }

     // Save the book in the database
     Book::create([
        'title' => $request->input('title'),
        'author'=> Auth::user()->name,
        'author_id'=> Auth::user()->id,
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        'image' => $imagePath,
        'trending' => $request->has('trending'),
        'classic' => $request->has('classic'),
        'genre' => $request->input('genre'),
    ]);

    return redirect()->back()->with('success', 'Book added successfully!');
}

public function storeAdmin(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'trending' => 'sometimes|boolean',
        'classic' => 'sometimes|boolean',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('cover_images', 'public');
    }

     // Save the book in the database
     Book::create([
        'title' => $request->input('title'),
        'author'=> $request->input('author'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        'image' => $imagePath,
        'trending' => $request->has('trending'),
        'classic' => $request->has('classic'),
    ]);

    return redirect()->back()->with('success', 'Book added successfully!');
}

public function showUserWorks()
{
// Get the currently logged-in user ID
$userId = Auth::id();
    
// Retrieve all books where the logged-in user is the author
$userBooks = Book::where('author_id', $userId)->get();

// Pass the user's books to the publish view
return view('publish', compact('userBooks'));   
}


}
