<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = request()->validate([
            'title'=>'required|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        if(request()->hasFile('post_image')){
            $inputs['post_image'] = time() . '.' . request()->post_image->extension();
            request()->post_image->move(public_path('images'), $inputs['post_image']);
        }

        auth()->user()->posts()->create($inputs);

        Session::flash('postCreatedMessage', 'Post was created');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $inputs = request()->validate([
            'title'=>'required|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if ($file =  $request->file('post_image')) {
         $inputs['post_image'] = $file->getClientOriginalName();
         $file->move(public_path('images'), $inputs['post_image']);
         $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $post->update();

        Session::flash('postUpdatedMessage', 'Post was updated');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('postDeletedMessage', 'Post was deleted');

        return redirect()->route('admin.posts.index');
    }
}
