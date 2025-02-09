<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Product::select('category')->distinct()->pluck('category');
        $products = Product::paginate(12);
        $featuredProducts = Product::where('is_featured', true)->take(4)->get();
        
        return view('products.index', compact('products', 'categories', 'featuredProducts'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
            
        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function byCategory($category)
    {
        $products = Product::where('category', $category)->paginate(12);
        $categories = Product::select('category')->distinct()->pluck('category');
        
        return view('products.index', compact('products', 'categories', 'category'));
    }
}
