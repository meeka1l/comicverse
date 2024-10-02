<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Adjust this if your CartItem model is located elsewhere
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a PaymentIntent with a dummy amount (e.g., $10.00)
        $paymentIntent = PaymentIntent::create([
            'amount' => 1000, // amount in cents ($10.00)
            'currency' => 'usd', // adjust to your needs
            'payment_method_types' => ['card'],
        ]);

        return view('checkout', compact('paymentIntent')); // Pass the PaymentIntent to the view
    }

    public function processCheckout(Request $request)
    {
        // Get the user's cart items from the session
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate the total amount
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity']; // Assuming your cart item structure
        }

        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a PaymentIntent with the total amount and currency
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmount * 100, // Stripe works with cents
                'currency' => 'usd', // Adjust currency as necessary
                'payment_method_types' => ['card'],
            ]);

            // Clear the cart session
            session()->forget('cart');

            // Redirect to a success page with a success message
            return redirect()->route('home')->with('success', 'Thank you for your purchase!');
        } catch (\Exception $e) {
            // Handle error, e.g., log the error and redirect back with an error message
            return redirect()->route('cart.index')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
