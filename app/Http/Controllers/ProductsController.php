<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request->all());
        // if($request->hasfile('attachments')){

        //     foreach($request->file('attachments') as $attachment){
        //         $name = $attachment->getClientOriginalName();

        //         $attachment->move(public_path().'/files/', $name);

        //         $data[] = $name;
        //     }
        // }

        // $product= new Product();
        // $product->name = $request['name'];
        // $product->material_id = $request['material_id'];
        // $product->description = $request['description'];
        // $product->properties = json_encode($request['properties']);
        // $product->attachments = json_encode($data);

        // $product->save();

        // return response()->json($product);
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

        if(!$product) { return back()->with('error', 'Product could not be found!'); }

        return view('products.single')->with('product', $product);
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

        if(!$product) { return back()->with('error', 'Product could not be found!'); }

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
        $product = Product::find($id);

        if(!$product) { return back()->with('error', 'Product could not be found!'); }

        // TODO update stuff here

        return view('products.single')->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product) { return back()->with('error', 'Product could not be found!'); }

        $product->delete();

        // TODO delete files too

        return view('products.index')->with('succcess', 'Product has been deleted');
    }
}
