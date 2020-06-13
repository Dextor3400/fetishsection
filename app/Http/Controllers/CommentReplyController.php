<?php

namespace App\Http\Controllers;

use App\Comment_reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Comment_reply $comment_reply)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment_reply  $comment_reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment_reply $comment_reply)
    {
        //
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
