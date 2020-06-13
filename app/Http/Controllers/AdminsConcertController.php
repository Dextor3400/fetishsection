<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminsConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concerts = Concert::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.concerts.index',compact('concerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.concerts.create');
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
            'date'=>'required',
            'venue'=>'required',
            'open'=>'required',
            'start'=>'required',
            'price_advance'=>'required',
            'price_onsite'=>'required',
            'more_info'=>'required',
        ]);

        auth()->user()->concert()->create($inputs);

        Session::flash('concertCreatedMessage', 'Concert was created');

        return redirect()->route('admin.concerts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function show(Concert $concert)
    {
        return view('admin.concerts.show',compact('concert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function edit(Concert $concert)
    {
        return view('admin.concerts.edit',compact('concert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concert $concert)
    {
        $inputs = request()->validate([
            'date'=>'required',
            'venue'=>'required',
            'open'=>'required',
            'start'=>'required',
            'price_advance'=>'required',
            'price_onsite'=>'required',
            'more_info'=>'required',
        ]);

        $concert->date = $inputs['date'];
        $concert->venue = $inputs['venue'];
        $concert->open = $inputs['open'];
        $concert->start = $inputs['start'];
        $concert->price_advance = $inputs['price_advance'];
        $concert->price_onsite = $inputs['price_onsite'];
        $concert->more_info = $inputs['more_info'];

        $concert->update();

        Session::flash('concertUpdatedMessage', 'Concert was updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concert $concert)
    {
        $concert->delete();

        Session::flash('concertDeletedMessage', 'Concert was deleted');

        return redirect()->route('admin.concerts.index');
    }
}
