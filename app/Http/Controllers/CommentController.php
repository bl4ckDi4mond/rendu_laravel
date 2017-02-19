<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CommentController extends Controller
{

    public function admin() {
        $comments = Comment::all();
        return view('comments.admin', compact('comments'));
    }

    public function delete($id) {
        $comments = Comment::find($id);
        $comments->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé');
    }

    public function update(Request $request, $id) {
        $comment = Comment::find($id);

            $comment->content = $request->content;
            $comment->save();

        return redirect()->route('comments.admin', [$comment->id])->with('success', 'Commentaire modifié');
    }


    public function create(Request $request, $id) {

        //Ancienne Methode

//        $article = Article::find($id);
//        $inputs = Input::all();
//
//            $image = $request->file('image');
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $location = public_path('images/' . $filename);
//
//        Comment::create([
//            'user_id' => Auth::user()->id,
//            'article_id' => $article->id,
//            'content' => $inputs['content'],
//            'image' => Image::make($image)->resize(800, 400)->save($location)
//        ]);

        $this->validate($request, array(
            'content'=> 'required'
        ));

        $article = Article::find($id);

        $comment = new Comment();

        $comment->user_id = Auth::user()->id;
        $comment->article_id = $article->id;
        $comment->content = $request->content;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $comment->image = $filename;
        }

        $comment->article()->associate($article);

        $comment->save();


        return redirect()->route('article.show', [$article->id])->with('success', 'Commentaire ajouté');
    }
}
