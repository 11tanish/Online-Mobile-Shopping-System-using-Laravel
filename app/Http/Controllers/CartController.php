<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'proid' => 'required|exists:prodm,proid',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve product ID and quantity from the request
        $productId = $request->input('proid');
        $quantity = $request->input('quantity');
        $userId = 2;
        
        // Check if the item already exists in the cart for the current session
        $existingCartItem = Cart::where('product_id', $productId)
            ->where('user_id', $userId) 
            ->first();

        if ($existingCartItem) {
            // If the item already exists, update the quantity
            $existingCartItem->update(['quantity' => $existingCartItem->quantity + $quantity]);
        } else {
            // If the item doesn't exist, create a new cart item
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Redirect the user to the cart view or any other page
        return redirect()->route('showCart')->with('success', 'Product added to cart successfully.');
    }
    public function showCart()
    {
    // Logic to fetch cart items from the database or session
    $cartItems = $this->fetchCartItems(); // Replace this with your actual logic to fetch cart items
    
    // Pass the cart items to the view and render it
    return view('user-layout.cart', ['cartItems' => $cartItems]);
    }

    public function fetchCartItems()
    {
        // Retrieve cart items from the database or session
        // Replace this with your actual logic to fetch cart items
        return Cart::all(); // This is just a placeholder; adjust it accordingly
    }

    public function showCheckout()
    {
        // Logic to fetch cart items from the database or session
        $cartItems = $this->fetchCartItems(); // Replace this with your actual logic to fetch cart items
    
        // Pass the cart items to the checkout view and render it
        return view('user-layout.checkout', ['cartItems' => $cartItems]);
    }
}
