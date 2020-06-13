<?php

namespace App\Http\Controllers;

use App\Comment_reply;
use App\Comment;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth;

class AdminsCommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = Comment_reply::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.comments.replies.index',compact('replies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'body' =>$request->body,
        ];

        Comment_reply::create($data);

        Session::flash('reply_message', 'Your reply has been submitted');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        $replies = $comment->replies;

        return view('admin.comments.replies.show', compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment_reply $comment_reply)
    {
        return view('admin.comments.replies.edit',compact('comment_reply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment_reply $comment_reply)
    {

        Comment_reply::findOrFail($comment_reply->id)->update($request->all());

        Session::flash('replyUpdatedMessage', 'Reply was updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment_reply $comment_reply)
    {
        $comment_reply->delete();

        Session::flash('replyDeletedMessage', 'Reply was deleted');

        return redirect()->back();
    }
}
