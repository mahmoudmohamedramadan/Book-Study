<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

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

        //updateExistingPivot PASS THE $product AS FIRST PARAMETER AND ATTRIBUTE WHICH YOU WANT TO UPDATE AS SECOND ONE, NOTICE HERE LARAVEL SEARCH IN id OF WHICH YOU PASSED AS FIRST PARAMETER IN PIVOT TABLE THEN EXECUTE FUNCTION, HERE WILL FIND THE RECORD WHICH product_id EQUALS 1 THEN WILL UPDATE category_id
        return $product->categories()->updateExistingPivot($product, [
            'category_id' => 2000
        ]);

        //sunc METHOD WILL REMOVE ALL DATA IN PIVOT TABLE AND PUT THE DATA OF $product AND $category
        return $product->categories()->sync($category);
    }
}
