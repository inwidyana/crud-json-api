<?php

namespace App\Http\Controllers;

use App\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userReviews = UserReview::all();

        return $userReviews->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|numeric|between:1.00,5.00',
            'review' => 'required|string',
        ]);

        if($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $userReview = new UserReview();
        $userReview->order_id = $request->order_id;
        $userReview->product_id = $request->product_id;
        $userReview->user_id = $request->user_id;
        $userReview->rating = $request->rating;
        $userReview->review = $request->review;
        $userReview->save();

        return response('CREATED', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userReview = UserReview::find($id);
        return $userReview->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|numeric|between:1.00,5.00',
            'review' => 'required|string',
        ]);

        if($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $userReview = UserReview::find($id);

        $userReview->order_id = $request->order_id;
        $userReview->product_id = $request->product_id;
        $userReview->user_id = $request->user_id;
        $userReview->rating = $request->rating;
        $userReview->review = $request->review;
        $userReview->save();

        return response('UPDATED', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userReview = UserReview::find($id);

        $userReview->delete();

        return response('DELETED', 200);
    }
}
