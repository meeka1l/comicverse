<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $trendingBooks = Book::where('trending', true)->get(); // Fetch trending books
        $classicBooks = Book::where('classic', true)->get(); // Fetch classic books
        $allBooks = Book::all(); // Fetch all books
        return view('home', compact('trendingBooks', 'allBooks','classicBooks'));     
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Get image content as binary data
        $imageContent = file_get_contents($request->file('image'));
        $validated['image'] = $imageContent;
    }

    Book::create($validated);

    return redirect()->route('admin.books.index')->with('success', 'Book added successfully');
}

public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Get image content as binary data
        $imageContent = file_get_contents($request->file('image'));
        $validated['image'] = $imageContent;
    }

    $book->update($validated);

    return redirect()->route('admin.books.index')->with('success', 'Book updated successfully');
}

}
