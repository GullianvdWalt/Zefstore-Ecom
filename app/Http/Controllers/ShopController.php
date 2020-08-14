<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variables
        // Pagination Number of products per page
        $pagination = 9;
        // Get All Categories for asside category nav
        $categories = Category::all();

        // Query String
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                // Get Products by Category slug from view request
                $query->where('slug', request()->category);
            });
            // Optional -> if category does not exist
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            // Show all products
            $products = Product::where('featured', true);
            // Show all categories
            $categoryName = 'Featured';
        }

        // Sorting
        //  Sort By Price - Low To High (Ascending)
        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price', 'asc')->paginate($pagination);
            // Sort By Price - High To Low (Descending)
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate(9);
        }

        // Pass to Shop.blade.php
        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Get Product Based on slug id
        $product = Product::where('slug', $slug)->firstOrFail();

        // For product page, might like
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        // Return product in url
        return view('product')->with([
            // Return Product
            'product' => $product,
            // Return Might also like products
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

    public function search(Request $request)
    {
        // Minimum of three characters for searching
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // // Search Query
        // // Search By Name
        // $products = Product::where('name', 'like', "%$query%")
        //     // Search By Details
        //     ->orWhere('details', 'like', "%$query%")
        //     // Search By Description
        //     ->orWhere('description', 'like', "%$query%")->paginate(10);

        $products = Product::search($query)->paginate(10);

        // Return search results to the view
        return view('search-results')->with('products', $products);
    }
}
