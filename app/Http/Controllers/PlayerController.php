<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function player()
    {
        $players = DB::table('players')->where ('etat' ,'!=', 0)->get();
        return view ('admin.players')->with('players',$players);
       
    }
    public function playerapi()
    {
        $players = DB::table('players')->where ('etat' ,'!=', 0)->get();
       
       return response()->json($players,200);
    }
    public function playernor()
    {
        $players = DB::table('players')->where ('etat' ,'!=', 0)->get();
        return view ('normal.players')->with('players',$players);
        //return response()->json($players,200);
    }
    public function playerById($id)
    {

        return response()->json(Player::find($id),200);
    }
    public function playerSave(Request $request)
    {
            $player = new Player();
            $player->name=$request->name;
            $player->last_name=$request->last_name;
            $player->cin=$request->cin;
            $player->tel=$request->tel;
            $player->password=$request->password;
            $player->save();
            return response()->json($request,201);

    }
    public function playerUpdate(Request $request, Player $player)
    {    
        $player->update($request->all());
        return response()->json($player,200);
    }
    public function playerupdateEtat($id)
    {   $player = player::find($id);
        $player->etat = 0;
        $player->update();
        
        return redirect('dashboard');
    }
    /*public function playerBanne(Request $request, $id)
    {   $player = Player::find($id);
        $player->update($request->all());
        return response()->json($player,200);
    }*/
}

