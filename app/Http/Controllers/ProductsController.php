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
        $products = Product::paginate(10);
        return view('products.index', ['products' => $products]);
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
    public function store(ProductRequest $request)
    {

        $data = [];

        if($request->hasfile('attachments')){

            foreach($request->file('attachments') as $attachment){
                $name = $attachment->getClientOriginalName();

                $attachment->move(public_path().'/files/', $name);  

                $data[] = $name;  
            }
        }

        $product= new Product();
        $product->name = $request->name;
        $product->material_id = $request->material_id;
        $product->ingredients = json_encode($request->ingredients);
        $product->attachments = json_encode($data);

        $product->save();

        return view('products.index')->with('success', 'A new product has been added');  
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
        //
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
