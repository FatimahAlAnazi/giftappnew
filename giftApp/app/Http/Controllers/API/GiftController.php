<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\API\Gift;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Gift as GiftResource;
use App\Http\Controllers\API\BassController as BassController;
use App\Models\API\Gift as APIGift;

class GiftController extends BassController
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
        $gifts=Gift::all();
        return $this->sendResponse(GiftResource::collection($gifts),'All gifts');
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
            ('name')=>'required',
        ('gift_image')=>'required',
        ('description')=>'required',
        ('price')=>'required',
        ('discount')=>'required',
        ('stock')=>'required',
        ('color')=>'required',
        ('warp_paper')=>'required',
        ('card')=>'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $gifts=Gift::create($input);
        return $this->sendResponse(new GiftResource($gifts),'Your information is correct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gifts=Gift::find($id);
        if(is_null($gifts)) {

            return $this->sendError('Your information is not correct');

        }
        return $this->sendResponse(new GiftResource($gifts),'gifts  found ');

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
    public function update(Request $request, $gifts)
    {
        $input= $request->all();
        $validator=Validator::make( $input ,[
            ('name')=>'required',
        ('gift_image')=>'required',
        ('description')=>'required',
        ('price')=>'required',
        ('discount')=>'required',
        ('stock')=>'required',
        ('color')=>'required',
        ('warp_paper')=>'required',
        ('card')=>'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $gifts->name=$input['name'];
        $gifts->gift_image=$input['gift_image'];
        $gifts->description=$input['description'];
        $gifts->price=$input['price'];
        $gifts->discount=$input['discount'];
        $gifts->stock=$input['stock'];
        $gifts->color=$input['color'];
        $gifts->warp_paper=$input['warp_paper'];
        $gifts->card=$input['card'];

        return $this->sendResponse(new GiftResource($gifts),' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gifts)
    {
        $gifts->delete();
        return $this->sendResponse(new GiftResource($gifts),'  deleted successfully');
    }
}
//i create giftcontroller
