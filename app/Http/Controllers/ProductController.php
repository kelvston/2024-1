<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::OrderBy('fullName', 'desc');
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $a = request()->validate([
            'fullName' => 'required|unique:products,fullName,except,id',
            'emailAddress' => 'required|unique:products,emailAddress,except,id',
            'subject' => 'required',
            'message' => 'required',

        ]);


        $a['user_id'] = auth()->id();
        Product::create($a);
        $categories = Category::where(['id' => 0])->get();
        $categor = "<option value='' selected disabled>Select</option>";

        foreach ($categories as $category) {
            $categor .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
            $sub_categories = Category::where(['id' => $category->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categor .= "<option value='" . $sub_cat->id . "'>&nbsp;&nbsp;--&nbsp;" .
                    $sub_cat->name . "</option>";
            }
        }
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');



        // $product = new Product;
        // $product->fullName = $request->fullName;
        // $product->emailAddress = $request->emailAdress;
        // $product->subject = $request->subject;
        // $product->message = $request->message;
        // $product->save();


        // return redirect()->route('products.index')
        //                 ->with('success','product created successfully');




    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $a = request()->validate([
            'fullName' => 'required',
            'emailAddress' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $a = Product::find($id);
        $a->update($request->all());

        // m,nmmn
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product  $id)
    {
        // $product = Product::find($id);
        // $product->destroy();

        // return redirect()->route('products.index')
        //     ->with('success', 'Product deleted successfully');
    }
}
