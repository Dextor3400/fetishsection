<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Media;

class AdminsMediaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {     
        return view('admin.media.edit',compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {


        $inputs = request()->validate([
            'about_text'=>'required',
            'about_image'=>'file',
            'video_one'=>'required',
            'video_two'=>'required',
            'photo_one'=>'file',
            'photo_two'=>'file',
            'photo_three'=>'file',
        ]);

        if ($file = $request->file('about_image')) {
         $inputs['about_image'] = $file->getClientOriginalName();
         $file->move(public_path('images'), $inputs['about_image']);
         $media->about_image = $inputs['about_image'];
        }

        if ($file = $request->file('photo_one')) {
         $inputs['photo_one'] = $file->getClientOriginalName();
         $file->move(public_path('images'), $inputs['photo_one']);
         $media->photo_one = $inputs['photo_one'];
        }

        if ($file = $request->file('photo_two')) {
         $inputs['photo_two'] = $file->getClientOriginalName();
         $file->move(public_path('images'), $inputs['photo_two']);
         $media->photo_two = $inputs['photo_two'];
        }

        if ($file = $request->file('photo_three')) {
         $inputs['photo_three'] = $file->getClientOriginalName();
         $file->move(public_path('images'), $inputs['photo_three']);
         $media->photo_three = $inputs['photo_three'];
        }

        $media->about_text = $request['about_text'];
        $media->video_one = $inputs['video_one'];
        $media->video_two = $inputs['video_two'];

        $media->update();

        Session::flash('mediaUpdatedMessage', 'Update Succesful');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
