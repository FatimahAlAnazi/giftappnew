<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\API\Cart;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Cart as CartResource;
use App\Http\Controllers\API\BassController as BassController;
use App\Models\API\Cart as APICart;

class CartController extends BassController
{
// cartController

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
        $cart=Cart::all();
        return $this->sendResponse(CartResource::collection($cart),'All categorys');
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
            ('user_id')=>'required',
            ('gift_id')=>'required',
            


        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $cart=Cart::create($input);
        return $this->sendResponse(new CartResource($cart),'Your information is correct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart=Cart::find($id);
        if(is_null($cart)) {

            return $this->sendError('Your information is not correct');

        }
        return $this->sendResponse(new CartResource($cart),'cart  found ');

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
    public function update(Request $request, $cart)
    {
        $input= $request->all();
        $validator=Validator::make( $input ,[
            ('id')=>'required',
            ('user_id')=>'required',
            ('gift_id')=>'required',



        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }
        $cart->id=$input['id'];
        $cart->name=$input['user_id'];
        $cart->name=$input['gift_id'];


        return $this->sendResponse(new CartResource($cart),' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return $this->sendResponse(new CartResource($cart),'  deleted successfully');
    }
}
//i create Cartcontroller
