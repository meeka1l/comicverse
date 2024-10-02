<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Assuming you have a Cart model

class CartController extends Controller
{
    public function index(){
         // Fetch cart items for the authenticated user
         $cartItems = Cart::with('book') // Assuming there's a relationship with the Book model
         ->where('user_id', auth()->user()->id)
         ->get();
         return view('cart', compact('cartItems'));     
 
    }
    public function remove($id)
{
    $cartItem = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
    
    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    return redirect()->route('cart.index')->with('error', 'Item not found in cart.');
}

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
