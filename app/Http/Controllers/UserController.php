<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function userLogin(Request $request) {
      // $userMessage = new \App\Models\User();
      // $userData = $userMessage->login();


      $userMessage=$request->input();
      //$article = new \App\Models\Article;
      //$userCheck = $userMessage.$username;
      $userCheck = $userMessage[0];
      $passwordCheck = $userMessage[1];

      //$userMessage->username = $userCheck;
      //$userMessage->password = $passwordCheck;
      // $userCheck = DB::table('one_printuser')->where(['user_name' => $$loginMessage.username]);
      // $passwordCheck = DB::table('one_printuser')->where(['user_password' => $$loginMessage.password]);
      
      $resource = new \League\Fractal\Resource\Item($userMessage, function (\App\Task $userMessage) {
         return [
             'username' => $userMessage->username,
             'logincheck' => $userMessage->logincheck,
         ];
     });

     $fractal = new \League\Fractal\Manager();
     $fractal->setSerializer(new \League\Fractal\Serializer\ArraySerializer());
     return $fractal->createData($resource)->toJson();
      
      // if ($userCheck == null || $passwordCheck == null) {
      //    return false;
      // } else {
      //    return $userMessage;
      // }
      

      // $test = new \App\Models\cameraMessage;
      //       $test ->cameraType = '123';
      //       $test ->cameraName='test';
      //       $test ->ip = '192.168';
      //return response()->json($resource);
   }
}
