<?php

namespace App\Http\Controllers;

use App\Models\Department;

class CollectionController extends Controller
{
    public function index()
    {
        // $nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        // $collection = collect($nums);

        // $odds = $collection->reject(function($num) {
        //     return $num % 2 === 0;
        // });

        // return $collection->filter(function ($num) {
        //     return $num % 2 === 0;
        // });

        // return $collection->map(function ($num) {
        //     return $num * 10;
        // });

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

        return $departments->reduceDepartmentCount();
    }
}
