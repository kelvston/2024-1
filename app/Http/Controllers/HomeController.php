<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use App\User;
use App\Product;

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
    public function home()

    {
        // Role::create(['name' => 'doctor']);

        // if (auth()->user()->usertype == 1) {
        //     $users = DB::table('users')->first();
        //     // $users=DB::table('users')->pluck('name');  //retrieving name of column
        //     return view('home', ['users' => $users]);
        // } else {
        //     return view('welcome');
        // }
        $user_id = auth()->user('id');
        $users = User::with('product')->get();
        return view('home')->with('users', $users,  'products');
    }
}
