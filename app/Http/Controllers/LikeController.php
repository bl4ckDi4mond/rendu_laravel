<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(){

        if(Input::has("article_id")){

            $article_id=explode("_",Input::get("article_id"));

            //Find if user already liked the article
            if(Likes::where("article_id",$article_id[1])->where("user_id","1")->count()>0){
                Likes::where("article_id",$article_id[1])->where("user_id","1")->delete();
                return Response::json(array("result"=>"1","isunlike"=>"0","text"=>"Like"));
            }else{
                $like=new Likes();
                //We are using hardcoded user id for now , in production change
                //it to Sentry::getId() if using Sentry for authentication
                $like->user_id="1";
                $like->article_id=$article_id[1];
                $like->save();

                return Response::json(array("result"=>"1","isunlike"=>"1","text"=>"unlike"));
            }

            return Response::json(array("result"=>"1","isunlike"=>"1","text"=>"unlike"));
        }else{
            //No article id no access sorry
            return Response::json(array("result"=>"0"));
        }

    }

}
