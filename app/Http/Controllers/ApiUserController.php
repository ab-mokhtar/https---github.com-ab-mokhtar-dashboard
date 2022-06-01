<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\DB;

class ApiUserController extends Controller
{
     
    public function user()
    {
        $users = DB::table('users')->where ('etat' ,'!=', 0)->get();
        return response()->json($users,200);
        
    }
    public function userById($id)
    {
        
        return response()->json(user::find($id),200);
    }
    
 
    public function store(Request $request){
        if(user::where('email', '=', $request->email)->where('etat', '=',1)->exists())
        {

            
            return response()->json('email exist',201);
        }
      
        else
        {
                $user = new User();
                $user->name=$request->name;
                $user->last_name=$request->last_name;
                $user->phone=$request->phone;
                $user->email=$request->email;
                $user->remember_token;  
                $user->password = bcrypt($request->password);
                $user->save();
        
        return response()->json($user,200);
        }
    }
    public function userupdateEtat($id)
    {   $user = user::find($id);
        $user->etat = 0;
        $user->update();
        return response()->json($user,200);
    }
}

