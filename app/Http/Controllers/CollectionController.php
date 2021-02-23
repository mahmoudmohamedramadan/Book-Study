<?php

namespace App\Http\Controllers;

use App\Models\Department;

class CollectionController extends Controller
{
    public function index()
    {
    //     $nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    //     $collection = collect($nums);

        // reject method will return the reverse of inner condition, this means this wil return odd numbers only
        // $odds = $collection->reject(function($num) {
        //     return $num % 2 === 0;
        // });

        // filter method will return results depending on he condition, thios means this will return even numbers only
        // return $collection->filter(function ($num) {
        //     return $num % 2 === 0;
        // });

        // map method used to get something performed in each iterator
        // return $collection->map(function ($num) {
        //     return $num * 10;
        // });

        // here will reurn even numbers only then multiply each number in 10 and finally get sum of all numbers
        // return $collection
        //     ->filter(function ($num) {
        //         return $num % 2 === 0;
        //     })
        //     ->map(function ($num) {
        //         return $num * 10;
        //     })
        //     ->sum();

        // $collection->flip()  >> method swaps the collection's keys with their corresponding values:
        // $collection->flatten() >> method flattens a multi-dimensional collection into a single dimension

        // array_map(), array_reduce()

        $departments = Department::get();

        //reduceDepartmentCount is method inside `DepartmentCollection` colletion class which i assign it to Department model
        return $departments->reduceDepartmentCount();
    }
}
