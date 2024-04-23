<?php

namespace App\Http\Controllers;
use App\Models\Prodm;
use App\Models\Orders;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProController extends Controller
{
    //
    public function index()
    {
        if (auth()->check()) {
            // Retrieve the authenticated user's ID
            $userId = auth()->id();
        } else {
            // Set $userId to null or handle the case where the user is not authenticated
            $userId = null;
        }
        $products = Prodm::all();
        return view('viewpro')->with(compact('products','userId'));
    }
    
    public function store(Request $request)
    {   

        // //receive file data
        $file = $request->file('fileupload');

        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "uploads/";
            $file->move($path,$filename);
            //echo "File upload has file";
            // echo $file->getClientOriginalName();
            // echo "<br/>";
            // echo $file->getClientOriginalExtension();
            // echo "<br/>";
            // echo $file->getMimeType();               //જો બકા 😎
            // echo "<br/>";
            // echo $file->getSize();
        }
        else
           $filename = "avatar.png";



        $data = Prodm::where('proname',$request->proname)->first();
        if($data)
            return back()->withErrors("Product Already Exists");
        else
        {
            $prom = new Prodm;
            
            $prom->proname = $request->proname;
            $prom->brand = $request->brand;
            $prom->color = $request->color;
            $prom->instock = $request->instock;
            $prom->original_price = $request->original_price;
            $prom->discounted_price = $request->discounted_price;
            $prom->description = $request->description;
            $prom->prodphoto = $filename;
            $prom->save();
            
            return redirect('/viewpro');
        }
    }

    public function edit1(Request $r)
    {
        
        $prodata=Prodm::where('proid',$r->id)->first();
        return view('editpro')->with(compact('prodata'));
        
        /*$r->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:userm,email',
            'password' => 'required',
            'usertype' => 'required',
            'prod_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust maximum file size and allowed file types as needed
        ]);*/
    }
    public function update(Request $r)
    {

        $file = $r->file('fileupload');
        $path = "uploads/";
        $currentphoto = $r->currentphoto;
        if($r->file('fileupload'))
        {
            $filename = $file->getClientOriginalName();
            $file->move($path,$filename);
        }
        else
            $filename = $currentphoto;


       /* $status=$r->currentstatus;
        if($r->userstatus=="Active")
            $status=1;
        else if($r->userstatus="Inactive")
            $status=0;
        else    
            $status=$r->currentstatus;

        $usertype=$r->currentusertype;
        if($r->usertype=="Admin")
            $usertype="Admin";
        else if($r->usertype=="Customer")
            $usertype="Customer";
        else
            $usertype=$r->currentusertype;*/

        Prodm::where('proid',$r->proid)->update([
            "proname"=>$r->proname,
            "brand"=>$r->brand,
            "color"=>$r->color,
            "instock"=>$r->instock,
            "original_price" => $r->original_price,
            'discounted_price' => $r->discounted_price,
            'description' => $r->description,
            "prodphoto"=>$filename       
        ]);
        return redirect('/viewpro');
    }

    public function destroy(Request $request)
    {
    $productId = $request->proid;
    
    // Find the product by ID
    $product = Prodm::where($request->proid);

    // Check if the product exists
    if ($product) {
        // Delete the product
        $product->delete($request->proid);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }   else {
        // Redirect back with error message
        return redirect()->back()->with('error', 'Product not found or already deleted.');
        }
    }
   /*public function buy(Request $request)
    {    
         Assuming you receive the product ID and quantity from the request
        $productId =$request->proid;
        $quantity = $request->quantity;
    
         Fetch the product details
        $product = Prodm::find($productId);
    
         Check if the product is in stock
        if ($product->instock < $quantity) {
            return back()->withErrors("Insufficient stock for this product.");
        }
    
         Calculate total amount
        $totalAmount = $product->price * $quantity;
    
         Create a new order record
        Orders::create([
            'user_id' => auth()->user()->id,  Assuming you're using authentication
            'proid' => $productId,
            'quantity' => $quantity,
            'total_amount' => $totalAmount,
        ]);
    
        // Update the stock quantity of the product
        $product->instock -= $quantity;
        $product->save();
    
         Redirect or return a response as needed
        return redirect()->back()->with('success', 'Product purchased successfully.');
    }    */
   

    //buy product related function
    public function showServicesPage()
    {
        $products = Prodm::all(); // Fetch products from the database or any other source
        return view('user-layout.services',['products'=> $products]);
    }

    public function showProductsPage()
    {
        $products = Prodm::all(); // Fetch products from the database or any other source
        return view('user-layout.products',['products'=> $products]);
    }

    //add to cart related function
   /* public function addToCart(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_id' => 'required|exists:prodm,proid',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve product ID and quantity from the request
        $productId = $request->input('proid');
        $quantity = $request->input('quantity');

        // Check if the item already exists in the cart for the current session
        $existingCartItem = Cart::where('proid', $productId)
            ->where('session_id', $request->session()->getId())
            ->first();

        if ($existingCartItem) {
            // If the item already exists, update the quantity
            $existingCartItem->update(['quantity' => $existingCartItem->quantity + $quantity]);
        } else {
            // If the item doesn't exist, create a new cart item
            Cart::create([
                'session_id' => $request->session()->getId(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Redirect the user to the cart view or any other page
        return redirect()->route('user-layout.cart')->with('success', 'Product added to cart successfully.');
    }*/
   
}
