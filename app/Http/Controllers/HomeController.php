<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductCloth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allCategory = Category::get();
        return view('home',compact('allCategory'));
    }

    public function categoryOne($id)
    {
        //dd($id);
        $oneCategory = Category::where('id',$id)->first();
        //dd($oneCategory);

        $allCategory = Category::get();

        $allProduct = ProductCloth::get();

        return view('system.category_one',compact('allCategory','allProduct','oneCategory'));
    }
}
