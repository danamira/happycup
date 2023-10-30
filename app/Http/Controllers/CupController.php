<?php

namespace App\Http\Controllers;

use App\Models\Cup;
use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CupController extends Controller
{

    private function validateUniversityId($id) {
        // Notes: this functin will be implemented by fetching data from an API provided by the organization using happyCup;
        
        return true;
    }
    
    
    public function dispense(Request $request,$device) {

        
        $device = Device::where('uuid',$device)->first();
        
        if(!$device) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'Invalid UUID provided for the device. Unable to authenticate the devie.'
            ],400);
        }
        if(!$device->active) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'Out of order!'
            ],400);
        }

       
        if(!$request->has('uni_id')) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'No univeristy identifier provided for the user. Unable to authenticate the user.'
            ],400);
        }
     
        $uniId=$request->get('uni_id');


        if(!$uniId) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'No univeristy identifier provided for the user. Unable to authenticate the user.'
            ],400);
        }
        
        if(!$this->validateUniversityId($uniId)) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'Invalid univeristy identifier. Unable to authenticate the user.'
            ],400);
        }


      

        $user=User::where('university_id',$uniId)->first();
        
        if(!$user) {
            $user = new User();
            $user->university_id=$uniId;
            $user->save();
        }

        

        

        if($user->credit<2) {
            return response()->json([
                'status'=>'insufficient_credit',
                'status_code'=>403,
                'message'=>'Insufficient credit. Please top up.',
                'url'=>route('topup',['user'=>$user->id]),
            ],403);
        }
        if($device->cup_count<=0) {
            return response()->json([
                'status'=>'error',
                'status_code'=>403,
                'message'=>'No cups.',
            ],403);
        }
        
        $user->credit = $user->credit-2;
        $user->borrowed=$user->borrowed+1;
        $user->update();
        
        $device->cup_count=$device->cup_count-1;
        $device->update();
        
        
        return response()->json([
            'status'=>'success',
            'status_code'=>200,
            'message'=>'successfully recorded',
        ],200);
        

    }

    public function return($device,Request $request) {
        
        $device = Device::where('uuid',$device)->first();
        
        
        if(!$device) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'Invalid UUID provided for the device. Unable to authenticate the devie.'
            ],400);
        }

        

        if(!$request->has('uni_id')) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'No univeristy identifier provided for the user. Unable to authenticate the user.'
            ],400);
        }

        $uniId=$request->get('uni_id');


        if(!$this->validateUniversityId($uniId)) {
            return response()->json([
                'status'=>'error',
                'status_code'=>400,
                'error'=>'Invalid univeristy identifier. Unable to authenticate the user.'
            ],400);
        }


      

        $user=User::where('university_id',$uniId)->first();

        if(!$user) {
            $user = new User();
            $user->university_id=$uniId;
            $user->save();
        }

        


        $device->stored=$device->stored+1;
        $device->update();
        
        $user->credit=$user->credit+2;
        $user->borrowed=$user->borrowed-1;

        $user->update();
        
        
        
        return response()->json([
            'status'=>'success',
            'status_code'=>200,
            'order'=>'showMsg',
            'message'=>'Thank you for returning the cup. See you later!',
        ],200);        
        
        

        
        
    }
    
    
    public function scan() {

        return view('scan');
        
    }
    
    
    public function store(Request $request) {

        $identifier = $request->get('identifier');

        if(!$identifier) {
            return response()->json([
                'status'=>'error',
                'msg'=>'Bad request!',
            ],400);
        }
        
        $cup = new Cup();
        $cup->identifier= $identifier;
        $cup->save();


        return response()->json([
            'status'=>'success',
            'msg'=>'Successfully stored!',
        ],200);
        
        
        
    }    
    
}
