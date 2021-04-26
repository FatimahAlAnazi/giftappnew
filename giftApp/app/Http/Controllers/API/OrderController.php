<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\API\Order;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Order as OrderResource;
use App\Http\Controllers\API\BassController as BassController;
use App\Models\API\Order as APIOrder;

class OrderController extends BassController
{
// i create ordercontroller

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
        $orders=Order::all();
        return $this->sendResponse(OrderResource::collection($orders),'All orders');
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
        ('total_amount')=>'required',
        ('bank_transaction_id')=>'required',


        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $orders =Order::create($input);
        return $this->sendResponse(new OrderResource($orders),'Your information is correct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders=Order::find($id);
        if(is_null($orders)) {

            return $this->sendError('Your information is not correct');

        }
        return $this->sendResponse(new OrderResource($orders),'orders  found ');

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
    public function update(Request $request, $orders)
    {
        $input= $request->all();
        $validator=Validator::make( $input ,[
            ('id')=>'required',
            ('user_id')=>'required',
            ('gift_id')=>'required',
            ('total_amount')=>'required',
            ('bank_transaction_id')=>'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $orders->id=$input['id'];
        $orders->user_id=$input['user_id'];
        $orders ->gift_id=$input['gift_id'];
        $orders->total_amount=$input['total_amount'];
        $orders->bank_transaction_id=$input['bank_transaction_id'];

        return $this->sendResponse(new OrderResource($orders),' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $orders)
    {
        $orders->delete();
        return $this->sendResponse(new OrderResource($orders),'  deleted successfully');
    }
}
