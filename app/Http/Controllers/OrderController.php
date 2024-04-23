<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Prodm;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Buy a product.hjbhfhsdf
     *
     * @param  int  $userId
     * @param  int  $productId
     * @param  int  $quantity
     * @return array
     */
    public function index()
    {
        $orders = Orders::all();
        return view('vieworder')->with(compact('orders'));
    }
    public function buyProduct(Request $request)
    {
        
        \Log::info('Received proid: ' . $request->input('proid'));
        \Log::info('Received quantity: ' . $request->input('quantity'));

        
        $request->validate([
            'proid' => 'required|exists:prodm,proid',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Assuming you receive the product ID and quantity from the request
        $productId = $request->input('proid');
        $quantity = $request->input('quantity');
    
        // Fetch the product details
        $product = Prodm::findOrFail($productId);
    
        // Check if the product exists
        if ($product->instock < $quantity) {
            return response()->json(['success' => false, 'error' => 'Insufficient stock for this product.'], 400);
        }

        
    
        // Calculate total amount
        $totalAmount = $product->discounted_price * $quantity;
    
        // Create a new order record
        $order = new Orders();
        $order->user_id = 2;
        $order->product_id = $productId;
        $order->quantity = $quantity;
        $order->total_amount = $totalAmount;
        $order->save();
    
        // Update the stock quantity of the product
        $product->instock -= $quantity;
        $product->save();
    
        // Return success response
        return response()->json(['success' => true, 'order_id' => $order->id]);
    }
        public function showPurchaseForm()
    {
        // Fetch products or any other data you need for the purchase form
        $products = Prodm::all();

        // Pass the products data to the view and return the view
        return view('purchase_form', ['products' => $products]);
    }
    public function processPurchaseForm(Request $request)
    {
        // Fetch products or any other data you need for the purchase form
        $request->validate([
            'product_id' => 'required|exists:prodm,proid',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Call the buyProduct function with validated data
        $response = $this->buyProduct($request);
    
        // Decode the JSON response content
        $result = $response->getData();
    
        // Check the success status in the result
        if ($result->success) {
            return response()->json(['message' => 'Order placed successfully', 'order_id' => $result->order_id], 200);
        } else {
            return response()->json(['error' => $result->error], 400);
        }
    }
    
}
