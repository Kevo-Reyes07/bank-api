<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //Ojo.
use App\Models\Account; //Ojo.
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\AccountController;


class UserController extends Controller
{
   public function index():JsonResponse
   {
    $user = \App\Models\User::all();
    return response()->json($user);
   }
    public function create(Request $request): JsonResponse //Metodo Create. 
    {   
         //creacion del usuario. 
        $user = User::create([
            'full_name' => $request->input('full_name'),
            'cc' => $request->input('cc'),
            'email' => $request->input('email'),
        ]);

        //creacion de la cuenta. 
        Account::create([
            'number' => time(),
            'user_id' => $user->id,
        ]);
        
        return response()->json($user);
    }
     
 


}



    

