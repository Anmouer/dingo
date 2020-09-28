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

class UserController extends BaseController
{
   public function userLogin($loginMessage) {

      $userCheck = DB::table('one_printuser')->where(['user_name' => $$loginMessage.username]);
      $passwordCheck = DB::table('one_printuser')->where(['user_password' => $$loginMessage.password]);
      if ($userCheck == null || $passwordCheck == null) {
         return false;
      } else {
         return true;
      }
        
   }
}
