<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('query', function () {
    //Fluent Interface: is the method chaning provide simpler API to the end user like lower line...
    // $data = DB::table('users')->select('*')->get();

    //statement method return true if query was success else will return false
    // $data = DB::statement('select * from users');

    // $data = DB::select('select * from users where id = ? and name = ?', [
    //     1, 'Willow Rau'
    // ]);

    // $data = DB::table('users')->get();

    //you can name parameter for clarity
    // $data = DB::select('select * from users where id = :id', [
    //     'id' => 1
    // ]);

    //raw insert
    // $data = DB::insert(
    //     'insert into users (name, email, password) values (?, ?, ?)',
    //     [1, 'admin@gmail.com', Hash::make('admin')]
    // );

    // $data = DB::table('users')->select('name', 'email as Email')->get();

    // $data = DB::table('users')->select('name')
    //     ->addSelect('email as Email')
    //     ->get();

    //second parameter of where is comparison operator, if comparison operator is = you can drop it.
    // $data = DB::table('users')
    //     ->where('created_at', '<', date('Y-m-d h:i:s'))
    //     ->get();

    // $data = DB::table('users')
    //     ->where([
    //         ['created_at', '<', date('Y-m-d h:i:s')],
    //         ['id', 1]
    //     ])
    //     ->get();

    // $data = DB::table('users')
    //     ->where('created_at', '<', date('Y-m-d h:i:s'))
    //     ->where('id', 1)
    //     ->get();

    // $data = DB::table('users')
    //     ->where('created_at', '<', date('Y-m-d h:i:s'))
    //     ->orWhere('id', 1000)
    //     ->get();

    // $data = DB::table('users')
    //     ->where('created_at', '>', date('Y-m-d h:i:s'))
    //     ->orWhere(function ($query) {
    //         $query->where('id', 1);
    //     })
    //     ->get();

    // $data = DB::table('users')
    //     ->where('name', 'admin')
    //     ->orWhere('id', 1)
    //     ->where('email', 'admin@gmail.com')
    //     ->get();
    /* select * from users where created_at > date('Y-m-d h:i:s') or id = 1 and email = admin@gmail.com */

    // $data = DB::table('users')
    //     ->where('name', 'admin')
    //     ->orWhere(function ($query) {
    //         return $query->where('email', 'admin@gmail.com')
    //             ->where('created_at', '>', date('Y-m-d h:i:s'));
    //     })
    //     ->get();
    /* select * from users where created_at > date('Y-m-d h:i:s') or (id = 1 and 'created_at', '>', date('Y-m-d h:i:s')) */

    // $data = DB::table('users')
    //     ->whereBetween('id', [2, 5])
    //     ->get();

    // $data = DB::table('users')
    // ->whereNotBetween('id', [2, 10])
    // ->get();

    // $data = DB::table('users')
    //     ->whereIn('name', ['test', 'admin', 'Willow Rau'])
    //     ->get();

    // $data = DB::table('users')
    //     ->whereNull('name')
    //     ->get();

    // $data = DB::table('users')
    //     ->whereNotNull('name')
    //     ->get();

    //allow you to pass a raw unescaped string to added after the WHERE statement
    //#notice that whereRaw will not escape.
    // $data = DB::table('users')
    //     ->whereRaw('name = "admin"')
    //     ->get();

    // $data = DB::table('users')
    //     ->whereExists(function ($query) {
    //         return $query->where('id', 'admin');
    //     }, 'or', true)
    //     ->get();

    // $data = DB::table('users')
    //     ->where('name', 'admin')
    //     ->distinct()
    //     ->get();

    // $data = DB::table('users')
    //     ->orderBy('name')   //the default order direction is acsending
    //     ->get();

    // $data = DB::table('users')
    //     ->orderBy('name', 'desc')
    //     ->get();

    //notice that you can not make group using method chaning before get method
    // $groupedData = DB::table('users')
    // ->get();
    // $data = $groupedData->groupBy('name');

    //also you can group your data, you filter results based on properties using having or havingRow methods
    //notice that you can not use having or havingRaw without group
    // $data = DB::table('users')
    //     ->groupBy('id')
    //     ->having('created_at', '<', date('Y-m-d h:i:s'))
    //     ->get();

    //notice that you can not use skip individually without take method
    // $data = DB::table('users')
    //     ->skip(5)
    //     ->take(5)
    //     ->get();

    //oldest order by ascending
    // $data = DB::table('users')
    //     ->oldest()
    //     ->get();

    // $data = DB::table('users')
    //     ->latest()
    //     ->get();

    // $data = DB::table('users')
    //     ->inRandomOrder()
    //     ->get();

    //when the first parameter of when method is true will execute the colsure else will skip this whole method.
    // $data = DB::table('users')
    //     ->when(true, function($query) {
    //         return $query->where('id', 1);
    //     })
    //     ->get();

    //unless method is opposite of when.
    // $data = DB::table('users')
    //     ->unless(true, function($query) {
    //         return $query->where('id', 1);
    //     })
    //     ->get();

    //get only first one in array
    // $data = DB::table('users')
    //     ->where('email', 'like', '%.org%')
    //     ->first();

    //give me first oe in array or if you not found it fail(return 404 status code)
    // $data = User::where('email', 'like', '%.test%')
    //     ->firstOrFail();

    //find user using id
    // $data = DB::table('users')
    //     ->find(5);

    //find user using id and if not exists
    // $data = User::findOrFail(50);

    //get the value of specific column in first one
    // $data = DB::table('users')
    //     ->orderBy('name')
    //     ->value('email');

    //get min value for specific column
    // $data = DB::table('users')
    //     ->min('id');

    //get max value for specific column
    // $data = DB::table('users')
    //     ->max('id');

    //get average value for specific column
    // $data = DB::table('users')
    //     ->average('id');

    //get sum value for specific column
    // $data = DB::table('users')
    //     ->sum('id');

    // $data = DB::table('users')
    //     ->select(DB::raw('name AS Name'))
    //     ->get();

    //you can join two tables whcih stisfy a given condition.
    // $data = DB::table('users')
    //     ->join('posts', 'users.id', '=', 'posts.user_id')
    //     ->get();

    // $data = DB::table('users')
    //     ->join('posts', function ($join) {
    //         $join->on('posts.user_id', '=', 'posts.user_id')
    //             ->orOn('users.id', '=', 'posts.body');
    //     })
    //     ->get();

    //you can left join two tables whcih stisfy a given condition.
    // $data = DB::table('users')
    //     ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
    //     ->get();

    //you can right join two tables whcih stisfy a given condition.
    // $data = DB::table('users')
    //     ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
    //     ->get();

    //to use union the two tables must have the number of column
    // $posts = DB::table('posts')
    //     ->whereNotNull('body')
    //     ->select('id')
    //     ->addSelect('body');

    // $data = DB::table('comments')
    //     ->select('id', 'post_id')
    //     ->union($posts)
    //     ->get();

    //insert new data into table, you can add multi rows
    // $data = DB::table('users')
    // ->insert([
    //     ['name' => 'Mahmoud Ramadan', 'email' => 'mr@gmail.com', 'password' => Hash::make('admin')],
    //     ['name' => 'Mahmoud Ali', 'email' => 'ma@gmail.com', 'password' => Hash::make('admin')],
    // ]);

    //insert one row then give me the last add row\'s id
    // $data = DB::table('users')
    // ->insertGetId([
    //     'name' => 'Osama Updated', 'email' => 'ou@gmail.com', 'password' => Hash::make('admin'),
    // ]);

    // $data = DB::table('users')
    // ->whereId(12)
    // ->update([
    //     'name' => 'Name Updated',
    // ]);

    //increment specific column, also you can specify the number which you want to increment
    // $data = DB::table('users')
    //     ->where('id', 16)
    //     ->increment('id', 2);

    //     $data = DB::table('users')
    //     ->where('id', 18)
    //     ->decrement('id', 4);

    //user transactions to ensure that all or not,but not some of a series of related quires are performed
    //here if there is user with id equal 12 and 1000 the transaction will implemented successfully else not thing will implemented
    DB::transaction(function () {
        DB::table('users')
            ->where('id', 12)
            ->update(['name' => 'Mariam Ali']);

        DB::table('users')
            ->where('id', 1000)
            ->update(['name' => 'User not found']);
    });

    // try {
    //     DB::beginTransaction();
    //     DB::table('users')
    //         ->where('id', 12)
    //         ->update(['name' => 'Nada Ali']);

    //     DB::table('users')
    //         ->where('id', 1000)
    //         ->delete();
    //     DB::commit();
    // } catch (\Exception $ex) {
    //     DB::rollBack();
    // }
});
