<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
class BrowseController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->query('search'); // Get search term from query string

    if ($searchTerm) {
        // Filter books by title or author using 'like' query
        $allBooks = Book::where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('author', 'like', '%' . $searchTerm . '%')
                        ->get();
    } else {
        $allBooks = Book::all(); // If no search, fetch all books
    }
       
            $trendingBooks = Book::where('trending', true)->get(); // Fetch trending books
            $classicBooks = Book::where('classic', true)->get(); // Fetch classic books
        
            return view('browsepage', compact('trendingBooks', 'allBooks','classicBooks'));     
        }
    
       
}
