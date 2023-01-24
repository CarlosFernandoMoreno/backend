<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
            'user_id' => 'required',
            'movie_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->movie_id = $request->movie_id;
        $comment->save();

        return $comment;
    }


    public function show($movie_id)
    {
        $comments = Comment::where('movie_id', $movie_id)->get();
        return $comments;
    }

    public function destroy($id)
    {   
        $comment = Comment::findORFail($id);
        $comment->delete();
        return response()->json(['message'=>'Comentario Eliminado']);

    }
}