<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Assuming you have a Cart model

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Get the data from the request
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity');

        // Example of adding to cart (You can customize this as per your Cart logic)
        Cart::create([
            'book_id' => $bookId,
            'user_id' => auth()->user()->id,
            'quantity' => $quantity,
        ]);

        // Redirect back to the homepage with success message
        return redirect()->back()->with('success', 'Book added to cart!');
    }
}
