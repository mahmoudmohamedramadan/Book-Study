<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HasManyController extends Controller
{
    public function index()
    {
        //modelKeys used to get all primary key in products table
        // return $product = Product::all()->modelKeys();
        $product = Product::first();
        $category = Category::first();

        //USED TO SET INTO PIVOT TABLE VALUES FROM $product AND $category
        // return $product->categories()->attach($category);

        //USED TO REMOVE VALUES FROM PIVOT TABLE WITH $product AND $category
        // return $product->categories()->detach($category);

        //HERE in the toggle method if the given ID is already atteched, it will be detached
        // return $product->categories()->toggle($category);

        //updateExistingPivot PASS THE $category AS FIRST PARAMETER AND ATTRIBUTE WHICH YOU WANT TO UPDATE AS SECOND ONE
        // return $product->categories()->updateExistingPivot($category, [
        //     'category_id' => 1000
        // ]);

        //sunc METHOD WILL REMOVE ALL DATA IN PIVOT TABLE AND PUT THE DATA OF $product AND $category
        return $product->categories()->sync($category);
    }
}
