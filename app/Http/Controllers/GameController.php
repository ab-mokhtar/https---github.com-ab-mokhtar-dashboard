<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\game;
use App\player;
use Illuminate\Support\Facades\DB;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $games= game::all();
        return view ('admin.games')->with('games',$games);
        //return response()->json($games,200);
    }
    public function index1()
    {
        $games= game::all();
        return view ('normal.games')->with('games',$games);
        //return response()->json($games,200);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function score($id)
    {
        $score = DB::table('games')
                     ->select(DB::raw('Sum(score) '))
                     ->where('player_id', '=', $id)
                     ->get();
                     return response()->json($score,200);          
    }
    public function tri()
    {
        $players =
        DB::table('games',)->select('player_id',DB::raw('Sum(score) '))->groupBy('player_id')->orderBy('Sum(score)')->get();
    
                     return response()->json($players,200);          
    }
    public function lead()
    {   
        $players = DB::select('select  cin ,Sum(score) as score  from  players,games where players.id = games.player_id group By (cin) order By (score) DESC ');
        
      
                     return response()->json($players,200);          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new game();
        $game->player_id=$request->player_id;
        $game->score=$request->score;
        $game->level=$request->level;
        $game->winner=$request->winner;
        $game->save();
        return response()->json($game,200);
    }

   
}
