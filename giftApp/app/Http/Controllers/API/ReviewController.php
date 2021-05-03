<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\API\Review;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Review as ReviewResource;
use App\Http\Controllers\API\BassController as BassController;
use App\Models\API\Review as APIReview;

class ReviewController extends BassController
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
        $reviews=Review::all();
        return $this->sendResponse(ReviewResource::collection($reviews),'All reviews');
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
        ('gift_id')=>'required',
        ('customer_name')=>'required',
        ('review')=>'required',
        ('star')=>'required',


        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $reviews=Review::create($input);
        return $this->sendResponse(new ReviewResource($reviews),'Your information is correct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews=Review::find($id);
        if(is_null($reviews)) {

            return $this->sendError('Your information is not correct');

        }
        return $this->sendResponse(new ReviewResource($reviews),'reviews  found ');

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
    public function update(Request $request, $reviews)
    {
        $input= $request->all();
        $validator=Validator::make( $input ,[
            ('id')=>'required',
        ('gift_id')=>'required',
        ('customer_name')=>'required',
        ('review')=>'required',
        ('star')=>'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $reviews->id=$input['id'];
        $reviews->gift_id=$input['gift_id'];
        $reviews->customer_name=$input['customer_name'];
        $reviews->review=$input['review'];
        $reviews->star=$input['star'];


        return $this->sendResponse(new ReviewResource($reviews),' updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $reviews)
    {
        $reviews->delete();
        return $this->sendResponse(new ReviewResource($reviews),'  deleted successfully');
    }
}
//i create reviewcontroller
