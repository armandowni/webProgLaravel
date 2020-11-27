<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //tampil feedbackuser
    public function feedbackUser(){
        return view('feedback');
    }
    // insert feedbackuser
    public function insertfeedbackUser(Request $request){
        $name = $request->session()->get('name');
        $id = Users::where('fullname', $name)->first(['id_user']);
        $id2 = Users::all()->find($id)->getAttribute('id_user');
        $rules = array(
            'userFeedback' => 'required|min:10'
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $feedback = new Feedback;
            $feedback->id_user = $id2;
            $feedback->textfeedback = $request->input('userFeedback');
            $feedback->feedvalidate = 'none';

            $feedback->save();
        }
    	return redirect()->to('/home');
    }

    // tampil feedback admin
    public function feedbackAdmin(){
        $feedback = DB::table('feedbacks')->get();

        return view('managefeedback')->with('feedback',$feedback);
    }

    public function updateStatus($id,Request $request){
//        $feedback = Feedback::find($id);

        if($request->input('btnStatus') == "Accepted"){
            $feedback = DB::table('feedbacks')->where('id_feedback', $id)
                ->update(['feedvalidate'
                => 'Accepted']);
        }else if($request->input('btnStatus') == "Reject"){
            $feedback = DB::table('feedbacks')->where('id_feedback', $id)
                ->update(['feedvalidate'
                => 'Rejected']);
        }
        // $feedback->save();

        return redirect()->to('manageFeedback');
    }


}
