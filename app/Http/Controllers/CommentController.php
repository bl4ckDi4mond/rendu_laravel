<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    public function create($id) {

        $article = Article::find($id);
        $inputs = Input::all();

        Comment::create([
            'user_id' => Auth::user()->id,
            'article_id' => $article->id,
            'content' => $inputs['comment'],
        ]);
        return redirect()->route('article.show', [$article->id])->with('success', 'Commentaire ajouté');
    }
}
