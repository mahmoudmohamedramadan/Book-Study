<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HasManyController extends Controller
{
    public function index()
    {
        $product = Product::first();
        $category = Category::first();

        // return $product->categories()->attach($category);
        return $product->categories()->detach($category);
    }
}
