<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
         // Fetch all books and users
         $books = Book::all();
         $users = User::all();
 
         // Pass the data to the view
         return view('crud', compact('books', 'users'));
    }
}

