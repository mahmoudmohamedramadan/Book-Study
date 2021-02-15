<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Scopes\GlobalScope;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        //called when call user object which taken using inject directive
        //this operation called Inject an Object (IOC)
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::get();
        // $users = User::all();
        // $users = User::where('email', 'like', '%.com%')
        //     ->get();

        //when you access User the global will called by default
        // $users = User::get();

        //to remove global scope you can use three ways, the first one is to specify the name of the global scope
        $users = User::withoutGlobalScope(GlobalScope::class)->get();

        //the second one is to specify the name of global scopes
        // $users = User::withoutGlobalScopes([GlobalScope::class])->get();

        //the third one is to remove all global scopes without passing the name of scopes
        // $users = User::withoutGlobalScopes()->get();

        // return $users->chunk(3);

        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = User::firstOrCreate([
        //     'name' => 'tset two',
        //     'email' => 'admin3@gmail.com',
        //     'password' => Hash::make('admin')
        // ]);

        // $user = User::firstOrNew([
        //     'name' => 'admin four',
        //     'email' => 'admin4@gmail.com',
        //     'password' => Hash::make('admin')
        // ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        // $user = new User([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);

        // $user = User::make([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
        // $user->save();
        // die($user);

        // die();
        //if password input not exist so abort the request
        abort_unless($request->has('password'), 404);
        // abort_if(!$request->has('password'), 405);

        $validator = Validator::make($request->only('name', 'email', 'password'), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //before embarking user action method, make sure that there is a route visit this controller and method
        // return redirect()->action('UserController@returnAlert');

        return redirect()->action([UserController::class, 'returnAlert']); #tuple form
    }

    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $users = User::findOrFail(5);

        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);

        //secure method like redirec()->to() but in HTTPS
        // return redirect()->secure('home');

        //redirect you to route named `home`
        // return redirect()->home();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        die('done...');

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //redirect one step back, ex: if you in users/1/edit after calling this method you will redirect to users/1
        return redirect()->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //destroy method take an array of id's rows which you want to delete
        // return User::destroy([20, 24]);

        //now when we add softDelete trait and delete user he will no delete but the deleted_at column will filled with the timestamp of delete
        $user->delete();

        return redirect('/users');
        // return redirect()->to('/users');
    }

    public function returnAlert()
    {
        session()->flash('success', 'data saved successfully');
        return back();

        // return response()->make('success');

        // return response()->json([
        //     'success' => true
        // ]);

        //jsonp take a callback as a header and data is the body of this header
        // return response()->jsonp('save message', ['success' => true]);

        //used to download file
        // return response()->download("D:\\test.txt", 'newName.txt');

        //used to display file content in browser
        // return response()->file("D:\\test.txt");

        //make some content from an external service without having to write it directly
        return response()->streamDownload(function () {
            //do something here...
        });
    }

    public function trashedUser()
    {
        //if we see results here we will notice that user who we are delete is not exists
        // return User::get();

        //now when we want to see the soft delete users write withTrashed
        // return User::withTrashed()->get();

        //when we want to get trashed users only use onlyTrashed
        // return User::onlyTrashed()->get();

        $deletedUser  = User::onlyTrashed()
            ->where('id', 1)
            ->first();

        if (isset($deletedUser)) {
            //to check user if soft deleted or not use trashed method
            if ($deletedUser->trashed()) {
                //to restore soft deleted use restore method
                return $deletedUser->restore();
            }
        }

        $user = User::first();

        return $user->forceDelete();
    }
}
