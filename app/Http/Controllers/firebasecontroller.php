<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class firebasecontroller extends Controller
{
    public function index(){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json')->withDatabaseUri("https://sayarti-122d7-default-rtdb.firebaseio.com");

        $database = $factory->createDatabase();
       
        $ref = $database->getReference('declarations');
        $vals = $ref->getValue();
        foreach ($vals as $val){
            $all_val = $val;
        }
         return view ('admin.home')->with('vals',$vals);  
    }
}
