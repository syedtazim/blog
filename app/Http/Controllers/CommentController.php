<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$post_id)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required',
            'comment' => 'required|min:5|max:2000'
        ]);

        $post = Post::find($post_id);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment =$request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('success','Comment wae added successfully');
        return redirect()->route('blog.single',[$post->slug]);

    }

    public function edit($id)
    {
        $comments =Comment::find($id);
        return view('comment.edit',compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comments = Comment::find($id);
        $this->validate($request,[
            'comment'=>'required|min:5'
        ]);
        $comments->comment = $request->comment;
        $comments->save();
        Session::flash('success','updated successfully');
        return redirect()->route('posts.show',$comments->post->id);
    }

    public function delete($id)
    {
        $comments= Comment::find($id);
        return view('comment.delete',compact('comments'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);
        $post_id = $comments->post->id;
        $comments->delete();
        Session::flash('success','Deleted Successfully');
        return redirect()->route('posts.show',$post_id);


    }
}
