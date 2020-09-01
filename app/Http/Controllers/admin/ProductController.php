<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $products = Product::all();
        return view('admin.product.index')
            ->with(['products' => $products,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
      public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->material = $request->get('material');

        if ($request->file('image'))
        {
            $file = $request->file('image')->store('img/product','public');
            $product->image = $file;
        }

        $product->size = $request->get('size');
        $product->category = $request->get('category');

        $product->save();

        return redirect()->route('products.index')
            ->with('status',' created product id {$product->id} successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($product)
    {
        $product = Product::findOrFail($product);

        return view('admin.product.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        if($product->image && file_exists(storage_path('app/public/' . $product->image)))
        {
            Storage::delete('public/'.$product->avatar);
            $file = $request->file('image')->store('img/product', 'public');
            $product->image = $file;
        }

        $product->material = $request->get('material');
        $product->stock = $request->get('stock');
        $product->size = $request->get('size');
        $product->status = $request->get('status');
        $product->category = $request->get('category');

        $product->save();


        return redirect()
            ->route('products.index')
            ->with('status','Great! Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
          $product->delete();
        return redirect()
            ->route('products.index')
            ->with('status',"The product was removed");

    }
}
