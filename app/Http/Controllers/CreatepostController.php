<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Mvcpost;
class CreatepostController extends Controller
{
  public function index(){
        $user = Auth::user();
        
        return view('createpost',[
            "username"=>$user->username,
            "photo"=>$user->photo
        ]);;
    }  
    public function dosearch(Request $request){
        $request->validate([
            "servizio"=>"required|string",
            "inputstr"=>"required|string"
        ]);

        $str=urlencode($request->inputstr);
        $servizio=$request->servizio;
        $arrayfinale = array();

     if($servizio === "giphy"){

        $api_key=env("GIPHY_API_KEY");
        
        $curl =curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://api.giphy.com/v1/gifs/search?api_key=$api_key&q=$str&limit=18&offset=0&rating=G&lang=it");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec($curl);
        curl_close($curl);
        $resultobj=json_decode($result);
        $resultarray=$resultobj->data;
        $arrayfinale[0]=$servizio;
        foreach($resultarray as $gifobj){
             $url=$gifobj->images->downsized_large->url;
             $titolo=$gifobj->title;
             $row=array("url"=>$url,"title"=>$titolo);
            $arrayfinale[]=$row;
        }
      
    }
    else if ($servizio === "deezer"){

        $curl =curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://api.deezer.com/search?q=$str&order=RANKING&limit=18");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec($curl);
        curl_close($curl);
        $resultobj=json_decode($result);
        $resultarray=$resultobj->data;
        $arrayfinale[0]=$servizio;
        foreach($resultarray as $gifobj){
             $url=$gifobj->album->cover_big;
             $titolo=$gifobj->title;
             $row=array("url"=>$url,"title"=>$titolo);
             $arrayfinale[]=$row;
        }
    }else if($servizio === "pixabay"){

        $api_key=env('PIXABAY_API_KEY');
        
        $curl =curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://pixabay.com/api/?key=$api_key&q=$str&image_type=photo&per_page=18");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec($curl);
        curl_close($curl);
        $resultobj=json_decode($result);
        $resultarray=$resultobj->hits;
        $arrayfinale[0]=$servizio;
        foreach($resultarray as $obj){
             $url=$obj->webformatURL;
             $titolo=$obj->tags;
             $row=array("url"=>$url,"title"=>$titolo);
            $arrayfinale[]=$row;
        }
    }
        return response()->json($arrayfinale);
    }

    public function newcontent(Request $request){
        $request->validate([
            "url"=>"required|string",
            "descrizione"=>"required|string",
            "servizio"=>"required|string",
            "title"=>"required|string"
        ]);
        $user = Auth::user();
        
        $post = new Mvcpost;
        $post->url_img= $request->url;
        $post->title= $request->title;
        $post->service= $request->servizio;
        $post->description= $request->descrizione;
        $post->user_id=$user->id;
        $post->date=Carbon::now();
        
        $post->save();
    
    
    }
}
