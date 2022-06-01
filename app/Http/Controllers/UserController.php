<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{   
    public function user()
    {
        $users = DB::table('users')->where ('etat' ,'!=', 0)->where('type' ,'!=', 'admin')->get();
        return view ('admin.registre')->with('users',$users);
        //return response()->json($users,200);
    }
    public function users()
    {
        $users = DB::table('users')->where ('etat' ,'!=', 0)->where('type' ,'!=', 'admin')->get();
        return view ('normal.users')->with('users',$users);
        //return response()->json($users,200);
    }
    public function userById($id)
    {
        $user=user::find($id);
        return response()->json($user,200);
    }
    public function create(){
        return view ('newuser');
     }
 
    public function store(Request $request){
        
        if(user::where('email', '=', $request->email)->where('etat', '=',1)->exists())
        {

            echo 'email exist';
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
                
                return redirect('registre') ;
        }
    }
    public function userupdateEtat($id)
    {   $user = user::find($id);
        $user->etat = 0;
        $user->update();
        return redirect('dashboard');
    }
   
}
