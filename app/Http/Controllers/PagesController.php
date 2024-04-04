<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about (){
        return view ('admin.about');
    }
public function blog_details(){
    return view('admin.blog_details');
}
public function blog(){
    return view('admin.blog');
}
public function doctors(){
    return view('admin.doctors');
}
public function contact(){
    return view('admin.contact');
}
public function index(){
    return view('admin.index');
}

// public function search(Request $request){
//     // Get the search value from the request
//     $search = $request->input('search');

//     // Search in the title and body columns from the posts table
//     $posts = User::query()
//         ->where('name', 'LIKE', "%{$search}%")
//         ->orWhere('email', 'LIKE', "%{$search}%")
//         ->get();

//     // Return the search view with the resluts compacted
//     return view('search', compact('users'));
// }

}
