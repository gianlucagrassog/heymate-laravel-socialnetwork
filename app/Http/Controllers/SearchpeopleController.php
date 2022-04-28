<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchpeopleController extends Controller
{
    public function index(){
        $user = Auth::user();
        //$utente= $user->username;
        //$posts = $user->post per ritornare tutti post dell utente
        return view('searchpeople',[
            "username"=>$user->username,
            "photo"=>$user->photo
        ]);;
    }
    public function searchpeople(Request $request){
    
        $risultati = array();
     

    //$queryselect="SELECT username,nome,cognome,img_dir FROM utente WHERE username!=\"$username\" AND username IN (SELECT username FROM utente WHERE username like \"%$str%\" OR nome like \"%$str%\" OR cognome like \"%$str%\")";
        $user = Auth::user();
        
        $users= DB::table('users')
          ->select('users.username','users.id', 'users.name', 'users.photo','users.surname')
          ->where('users.username', '<>', $user->username)
          ->whereIn('users.username',function($query) use($request){
                                    $query->select('users.username')
                                            ->from('users')
                                            ->where('users.username','like',"%".$request->searchstr."%")
                                            ->orWhere('users.name','like',"%".$request->searchstr."%")
                                            ->orWhere('users.surname','like',"%".$request->searchstr."%");})->get();
          
        if($users){

            foreach($users as $tmpuser){
                $seguito=DB::table('mvcfollowers')
                    ->where([['mvcfollowers.user_id_seguito','=',$tmpuser->id],
                            ['mvcfollowers.user_id_follower', '=', $user->id],
                        ])->first();
                if($seguito){
                    $tmpuser->seguito="Yes";
                }else{
                    $tmpuser->seguito="No";
                }
                $tmpuser->photo=Storage::url($tmpuser->photo);
                $risultati[]=$tmpuser;

            }
            return response()->json($risultati);
        }else{
            return response()->json("Nessun utente");
        }

    }

    public function follow(Request $request){
        $user = Auth::user();
        $request->validate([
            "seguito"=>"required|integer",
        ]);
        DB::table('mvcfollowers')->insert(['user_id_seguito' => $request->seguito, 'user_id_follower' => $user->id]);  
        return response("ok");
    }
     public function unfollow(Request $request){
        $user = Auth::user();
        $request->validate([
            "seguito"=>"required|integer",
        ]);
        DB::table('mvcfollowers')->where([
                                            ['user_id_seguito', '=',$request->seguito],
                                            ['user_id_follower', '=',$user->id],
                                            ])->delete();
        return response("ok");
    }
            

}
