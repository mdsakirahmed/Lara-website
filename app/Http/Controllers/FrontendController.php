<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\HomeContent;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Strength;
use App\Models\WebsiteMessage;
use App\Models\WebsiteSubscribe;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $partners = Partner::all();
        $home_contents = HomeContent::orderBy('serial', 'asc')->get();
        $strengths = Strength::all();
        $services = Service::all();
        $faqs = Faq::all();
        return view('frontend.index', compact('partners', 'home_contents', 'strengths', 'services', 'faqs'));
    }

    public function contactMessageStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|string',
            'phone'   => 'required|string',
            'message'   =>  'required|string',
        ]);
        $message = new WebsiteMessage();
        $message->name   = $request->name;
        $message->email   = $request->email;
        $message->subject   = $request->subject;
        $message->phone = $request->phone;
        $message->message = $request->message;

        try {
            $message->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully sent your message'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'success',
                'message' => 'Something going wrong. '.$exception->getMessage()
            ]);
        }
    }

    public function subscribeStore(Request $request){
        $request->validate([
            'email'=> 'required|email'
        ]);
        if(WebsiteSubscribe::where('email',$request->email)->exists()){
            return response()->json([
                'type' => 'success',
                'message' => 'Already Subscribed !',
            ]);
        }

        $subscribe = new WebsiteSubscribe();
        $subscribe->email = $request->email;
        try {
            $subscribe->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully Subscribed !.',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong. '.$exception->getMessage(),
            ]);
        }
    }
}
