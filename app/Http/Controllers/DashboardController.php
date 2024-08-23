<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCloth;
use App\Models\ProductPrice;
use App\Models\UserData;
use App\Models\CartProducts;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $allProduct = ProductCloth::get();
        //dd($oneCategory);
        $productPrice = ProductPrice::get();
        //dd($productPrice);

        $ipAddress = request()->ip();
        $userAgent = request()->userAgent();

        // Check if a record with the same IP address and user agent exists
            $existingVisitor = UserData::where('ip_address', $ipAddress)
            ->where('user_agent', $userAgent)
            ->first();

        if (!$existingVisitor) {
            // Create a new record only if it doesn't already exist
            UserData::create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
            ]);
        }

        $usersData = UserData::where('ip_address', $ipAddress)
        ->where('user_agent', $userAgent)
        ->select('id')
        ->first();

        if ($usersData) {
            $allCartCountProduct = CartProducts::join('product_cloths', 'product_cloths.id', 'cart_products.product')
                ->where('user_data', $usersData->id)
                ->select('product_cloths.product_name as name', 'product_cloths.image as image')
                ->get();
        } else {
            $allCartCountProduct = collect(); // Empty collection if $usersData is null
        }

        return view('welcome',compact('allProduct','productPrice','allCartCountProduct'));
    }

    public function search(Request $request)
    {
        // $query = $request->input('query');
        // $allProduct = ProductCloth::where('product_name', 'like', "%$query%")->get();


        $searchTerm = $request->input('query');

        $allProduct = ProductCloth::where('product_name', 'like', "%{$searchTerm}%")
                            ->orWhere('color', 'like', "%{$searchTerm}%")
                            ->get();
    
        // Check if the search results are empty
        if ($allProduct->isEmpty()) {
            // If no results are found, return a message
            $message = "We Currently dont have this '{$searchTerm}' Product .";
            return view('System.search_results', compact('message'));
        } else {
            // If results are found, return the search results
            return view('System.search_results', compact('allProduct'));
        }
    }

    public function addProductCart(Request $request)
    {
        //dd($request);

         // Retrieve user ID from session or authentication
        $userId = auth()->id();

        // Retrieve product ID from the request
        $productId = $request->product_id;

        $ipAddress = request()->ip();
        $useragent = request()->userAgent();
        $usersData = UserData::where('ip_address', $ipAddress)
        ->Where('user_agent', $useragent)
        ->select('id as id')
        ->first();
        //dd($usersData);

        $existingCartProduct = CartProducts::where('user_data', $usersData->id)
        ->where('product', $productId)
        ->where('user', $userId)
        ->first();

        // if ($existingCartProduct) {
        //     // If the product already exists in the cart, return a message indicating it's already added
        //     return response()->json(['message' => 'Product is already added to the cart']);
        // }
    
        // Save data to the cart_products table
        CartProducts::firstOrCreate([
            'user_data' => $usersData->id,
            'product' => $productId,
            'user' => $userId,
            'status' => 'Added',
            'created_by' =>$userId,
            'updated_by'=>'Null',
            // You can set other fields like status, created_by, etc.
        ]);

        // show all count
        if (!$usersData) {
            return response()->json(['error' => 'User data not found'], 404);
        }

        $allCartProduct = CartProducts::join('product_cloths','product_cloths.id','cart_products.product')->where('user_data', $usersData->id)
        ->select('product_cloths.product_name as name','product_cloths.image as image')
        ->get();
        //dd($allCartProduct);

        return response()->json(['product' => $allCartProduct]);

    }

    public function allCart(Request $request)
    {
        //dd($request);
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();
        $usersData = UserData::where('ip_address', $ipAddress)
        ->where('user_agent', $userAgent)
        ->select('id')
        ->first();

        if (!$usersData) {
            return response()->json(['error' => 'User data not found'], 404);
        }

        $allCartProduct = CartProducts::join('product_cloths','product_cloths.id','cart_products.product')->where('user_data', $usersData->id)
        ->select('product_cloths.product_name as name','product_cloths.image as image')
        ->get();
        //dd($allCartProduct);
        // Prepare data for response with full image URLs
        $cartProducts = [];
        foreach ($allCartProduct as $product) {
            // Assuming 'image' field stores a relative path
            $imageUrl = asset('images/' . $product->image);  // Adjust path based on your storage location
            $cartProducts[] = [
            'name' => $product->name,
            'image' => $imageUrl,
            // ...
            ];
        }

        return response()->json(['product' => $cartProducts]);
    }
}


