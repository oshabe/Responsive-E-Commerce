<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductCloth;
use App\Models\ClothVariation;
use App\Models\ProductPrice;
use App\Models\UserData;
use App\Models\CartProducts;

class CategoryController extends Controller
{
    public function allCategory()
    {
        // $otherCount = Resident::where('created_by',auth()->user()->id)->where('r_gender', 'Others')->count();
        // $lc1=Village::where('email',auth()->user()->email)->first();

        $allCategory = Category::get();

        return view('system.intelligence_one',compact('allCategory'));
    }

    public function oneCategory($id)
    {
        //dd($id);
        $oneCategory = Category::where('id',$id)->first();
        //dd($oneCategory);

        $allCategory = Category::get();

        $allProduct = ProductCloth::get();

        return view('system.categoryOne',compact('allCategory','allProduct','oneCategory'));
    }
    
    public function storeCategory(Request $request)
    {
        //dd($request);       

         // Validate the incoming request data
         $validatedData = $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required', // Adjust validation rules for the image
            // Add more validation rules if needed
        ]);

        // Save the category
        $category = new Category();
        $category->name = $request->input('productName');
        $category->description = $request->input('productDescription');
        $category->status ='Active';
        $category->created_by = auth()->user()->id; // Assuming you're using authentication
        $category->updated_by ='Null';

        // Handle the image upload if provided
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Move the uploaded file to a folder
            //dd($imageName);
            $category->image = $imageName;
        }

        // Set status, created_by, updated_by if needed

        // Save the category
        $category->save();

        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function editCategory(Request $request)
    {
        //dd($request);

        //edit
        Category::where('id', $request->editCategoryId)
        ->update([ 
            'name' => $request->productEditName,
            'description' => $request->productEditDescription,
            'updated_by'=>auth()->user()->id
        ]);

        // Redirect the user to a confirmation page or somewhere else
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function deleteCategory(Request $request)
    {
        //dd($request);

        // Find the category by ID and delete it
        $category = Category::find($request->categoryId,);
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    public function storeProduct(Request $request)
    {
        //dd($request);
        // Validate the form data
        // $validatedData = $request->validate([
        //     'product_name' => 'required',
        //     'description' => 'required',
        //     'category_id' => 'required', // Assuming you have a select input for category
        //     // Add validation rules for other fields
        // ]);

        // Handle the image upload if provided
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Move the uploaded file to a folder
            //dd($imageName);
        }


        $product = ProductCloth::create([
            'product_name' => $request->productName,
            'description' => $request->productDescription,
            'category' => $request->category, // Assuming $request->category holds the selected category ID
            'material' => $request->materialSelect,
            'color' => $request->color,
            'sleeve_type' => $request->sleeveType,
            'style' => $request->style,
            'gender' => $request->gender,
            'production_country' => $request->productionCountry,
            'weight' => $request->weight,
            'image' => $imageName, // Assuming $request->productImage holds the image file
            // Add more fields as needed
        ]);

        foreach ($request->size as $size) {
            ClothVariation::create([
                'size' => $size,
                'product' => $product->id, 
                'status'=>"Active",
                'created_by'=>auth()->user()->id,
                'updated_by'=>"Null",
            ]);
        }

        ProductPrice::create([
            'product' => $product->id, 
            'current_price' => $request->productPrice,
            'expired_price' =>"Null",
            'status'=>"Active",
            'created_by'=>auth()->user()->id,
            'updated_by'=>"Null",
        ]);

        // Redirect the user to a confirmation page or somewhere else
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function editProduct(Request $request)
    {
        //dd($request);

        //edit
        $product = ProductCloth::find($request->productId);
        $product->update([
            'product_name' => $request->productEditName,
            'description' => $request->productEditDescription,
            'material' => $request->materialeditSelect,
            'color' => $request->editcolor,
            'sleeve_type' => $request->sleeveedtType,
            'style' => $request->editstyle,
            'gender' => $request->editgender,
            'production_country' => $request->productioneditCountry,
            'weight' => $request->editweight,
            //'updated_by'=>auth()->user()->id
        ]);

        $currentPrice=ProductPrice::where('product', $request->productId)->first();
        ProductPrice::where('product', $request->productId)
        ->update([ 
            'current_price' => $request->producteditPrice,
            'expired_price' => $currentPrice->current_price,
            'updated_by'=>auth()->user()->id
        ]);

        // Redirect the user to a confirmation page or somewhere else
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function deleteProduct(Request $request)
    {
        //dd($request);

        // Find the Product by ID and delete it
        $Product = ProductCloth::find($request->ProductDeleteIcon,);
        if ($Product) {
            $Product->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function singleProduct($id)
    {
        //dd($id);
        $oneProduct = ProductCloth::where('id',$id)->first();
        //dd($oneCategory);

        $variationProduct = ClothVariation::where('product',$id)->get();
        //dd($variationProduct);

        $productPrice = ProductPrice::where('product',$id)->first();
        //dd($productPrice);

        $ipAddress = request()->ip();
        $userAgent = request()->userAgent();

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
        
        return view('system.single_product',compact('oneProduct','variationProduct','productPrice','allCartCountProduct'));
    }
}
