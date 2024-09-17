<?php
// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'trending' => 'nullable|boolean',
        'classic' => 'nullable|boolean',
    ]);

    Book::create([
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        'trending' => $request->has('trending'),
        'classic' => $request->has('classic'),
    ]);

    return redirect()->back()->with('success', 'Book added successfully!');
}


}
