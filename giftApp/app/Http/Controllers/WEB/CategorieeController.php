<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WEB\Categoriee;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class CategorieeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categoriee = Categoriee::latest('categoriee')->paginate(5);
        return view('categoriee.index',compact('categoriee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            
            ('categoriee')=>'required',
            ('product_id')=>'required',

        ]);
        $categoriee=Categoriee::create($request->all());
        return redirect()->route('categories.index')->with('succes','categoriee add successiflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriee $categoriee)
    {
        return view('categoriee.show',compact('categoriee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriee $categoriee )
    {
        return view('categoriee.edit',compact('categoriee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriee $categoriee)
    {
        $request->validate([
            ('categoriee')=>'required',
            ('product_id')=>'required',
            
        ]);
        $categoriee->update($request->all());
        return redirect()->route('categories.index')->with('succes','categoriee update successiflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriee->delete();
        return redirect()->route('categories.index')->with('succes','categoriee delete successiflly');
    }
}
