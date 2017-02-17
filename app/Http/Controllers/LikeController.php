<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeComment($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Comment', $id);
        return redirect()->back();
    }

    public function likeArticle($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Article', $id);
        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeType($type)->whereLikeId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'   => Auth::id(),
                'like_id'   => $id,
                'like_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
