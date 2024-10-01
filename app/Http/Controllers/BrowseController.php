<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
class BrowseController extends Controller
{
    public function index()
    {
       
            $trendingBooks = Book::where('trending', true)->get(); // Fetch trending books
            $classicBooks = Book::where('classic', true)->get(); // Fetch classic books
            $allBooks = Book::all(); // Fetch all books
            return view('browsepage', compact('trendingBooks', 'allBooks','classicBooks'));     
        }
    
       
}
