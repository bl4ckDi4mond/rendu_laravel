<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, $id) {
        $this->validate($request, [
            'content' => 'required'
        ],
            [
                'content.required' => 'Contenu obligatoire'
            ]);

        $article = Article::find($id);

        Comment::create([
            'user_id' => Auth::user()->id,
            'article_id' => $article->id,
            $article->content = $request->content
        ]);
        return redirect()->route('article.show', [$article->id])->with('success', 'Commentaire ajouté');
    }
}
