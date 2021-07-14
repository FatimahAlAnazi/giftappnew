<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WEB\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::latest()->paginate(10);

        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            ('name')=>'required',
        ('product_image')=>'required',
        ('description')=>'required',
        ('price')=>'required',
        ('discount')=>'required',
        ('stock')=>'required',
        ('color')=>'required',
        ('warp_paper')=>'required',
        ('card')=>'required',



        ]);
        $product=Product::create($request->all());
        return redirect()->route('products.index')->with('succes','product add successiflly');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            ('name')=>'required',
        ('product_image')=>'required',
        ('description')=>'required',
        ('price')=>'required',
        ('discount')=>'required',
        ('stock')=>'required',
        ('color')=>'required',
        ('warp_paper')=>'required',
        ('card')=>'required',



        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('succes','product update successiflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('succes','product delete successiflly');

    }
}
