<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        //$utente= $user->username;
        //$posts = $user->post per ritornare tutti post dell utente
        return view('home',[
            "username"=>$user->username,
            "nome"=>$user->name,
            "cognome"=>$user->surname,
            "photo"=>$user->photo,
            "follower"=>$user->numfollower,
            "seguiti"=>$user->numseguiti
        ]);
    }

    public function getpost(){
        $risultati = array();

       $user = Auth::user();
       
       $post= DB::table('users')
          ->join('mvcposts', 'users.id', '=', 'mvcposts.user_id')
          ->select('mvcposts.id','users.username', 'users.name', 'users.photo','users.surname','mvcposts.url_img','mvcposts.title','mvcposts.description','mvcposts.date','mvcposts.likes')
          ->whereIn('users.id',function($query) use($user){
                                    $query->select('mvcfollowers.user_id_seguito')
                                            ->from('mvcfollowers')
                                            ->where('mvcfollowers.user_id_follower',$user->id);})
                                            ->orWhere('users.id',$user->id)->orderBy('mvcposts.date', 'desc')
                                            ->get();
                                            

        if($post){
            foreach($post as $tmp){
                $liked=DB::table('mvclikes')
                    ->where([['mvclikes.post_id','=',$tmp->id],
                            ['mvclikes.user_id','=', $user->id],
                        ])->first();
                if($liked){
                    $tmp->liked="Yes";
                }else{
                    $tmp->liked="No";
                }
                $tmp->photo=Storage::url($tmp->photo);
                $risultati[]=$tmp;

            }
            return response()->json($risultati);
        }else{
            return response()->json("Nessun Post");
        }

    }
    public function like(Request $request){
        $user = Auth::user();
        $request->validate([
            "post"=>"required|integer",
        ]);
        DB::table('mvclikes')->insert(['post_id' => $request->post, 'user_id' => $user->id]);  
        return response("ok");
    }

    
    public function dislike(Request $request){
        $user = Auth::user();
        $request->validate([
            "post"=>"required|integer",
        ]); 
        DB::table('mvclikes')->where([      
                                            ['post_id','=',$request->post],
                                            ['user_id','=',$user->id],
                                            ])->delete();
        return response("ok");
    }
    public function userslike(Request $request){
        $request->validate([
            "post"=>"required|integer",
        ]);
        
        $users=DB::table('users')
          ->join('mvclikes', 'users.id', '=', 'mvclikes.user_id')
          ->select('users.username', 'users.name', 'users.photo','users.surname')
          ->where('mvclikes.post_id',$request->post)->get();
        
        if($users){
            foreach ($users as $tmp) {
                $tmp->photo=Storage::url($tmp->photo);
            }
            return response()->json($users);
        }else{
            return response()->json("Nessun like");
    }
/*
        SELECT utente.username,utente.nome,utente.cognome,utente.img_dir 
                    FROM utente INNER JOIN likes ON utente.username=likes.utente 
                    WHERE likes.post=\"$str\""
    */




}
}
