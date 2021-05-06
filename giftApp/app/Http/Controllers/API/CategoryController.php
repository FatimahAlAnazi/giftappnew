<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\API\Category;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Controllers\API\BassController as BassController;
use App\Models\API\Category as APICategory;

class CategoryController extends BassController
{
// test comment for github

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys=Category::all();
        return $this->sendResponse(CategoryResource::collection($categorys),'All categorys');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->all();
        $validator=Validator::make( $input ,[
            ('id')=>'required',
            ('name')=>'required',


        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $categorys=Category::create($input);
        return $this->sendResponse(new CategoryResource($categorys),'Your information is correct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorys=Category::find($id);
        if(is_null($categorys)) {

            return $this->sendError('Your information is not correct');

        }
        return $this->sendResponse(new CategoryResource($categorys),'categorys  found ');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categorys)
    {
        $input= $request->all();
        $validator=Validator::make( $input ,[
            ('id')=>'required',
            ('name')=>'required',



        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }
        $categorys->id=$input['id'];
        $categorys->name=$input['name'];


        return $this->sendResponse(new CategoryResource($categorys),' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorys)
    {
        $categorys->delete();
        return $this->sendResponse(new CategoryResource($categorys),'  deleted successfully');
    }
}
//i create Categorycontroller
