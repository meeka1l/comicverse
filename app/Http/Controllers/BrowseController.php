<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
class BrowseController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->query('search'); // Get search term from query string
        $selectedGenre = $request->query('genre'); // Get selected genre from query string
    
        // Build the query for fetching books
        $query = Book::query();
    
        // Apply search filter if there is a search term
        if ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('author', 'like', '%' . $searchTerm . '%');
        }
    
        // Apply genre filter if a genre is selected
        if ($selectedGenre) {
            $query->where('genre', $selectedGenre);
        }
    
        // Execute the query to get the filtered books
        $allBooks = $query->get(); // Fetch filtered books
    
        // Fetch trending and classic books
        $trendingBooks = Book::where('trending', true)->get(); // Fetch trending books
        $classicBooks = Book::where('classic', true)->get(); // Fetch classic books
    
        // Return the view with all relevant data
        return view('browsepage', compact('trendingBooks', 'allBooks', 'classicBooks'));
    }
    
    
       
}
