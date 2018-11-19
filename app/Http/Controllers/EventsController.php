<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\events;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = \App\events::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\categories::all();

        return view('events.insert', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'id_events' => 'required',
            'name' => 'required',

            'start_date' => 'required',
            'end_date' => 'required',

            'place' => 'required',
            'theme' => 'required',
            'category' => 'required',

            'tujuan' => 'required'
        ]);

        //insert
        $events = new events([
            'id_events' => $request->get('id_events'),
            'name' => $request->get('name'),

            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),

            'place' => $request->get('place'),
            'theme' => $request->get('theme'),
            'category' => $request->get('category'),

            'tujuan' => $request->get('tujuan')
        ]);

        $events->save();

        return redirect('events')->with('success', 'Event baru ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        route('events.edit', $evt->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = events::find($id);
        $categories = \App\categories::all();

        return view('events.edit', compact('events', 'categories'));
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
        //validasi
        $request->validate([
            'id_events' => 'required',
            'name' => 'required',

            'start_date' => 'required',
            'end_date' => 'required',

            'place' => 'required',
            'theme' => 'required',
            'category' => 'required',

            'tujuan' => 'required'
        ]);

        //collecting the data
        $events = events::find($id);

        $events->id_events = $request->get('id_events');
        $events->name = $request->get('name');

        $events->start_date = $request->get('start_date');
        $events->end_date = $request->get('end_date');

        $events->place = $request->get('place');
        $events->theme = $request->get('theme');
        $events->category = $request->get('category');

        $events->tujuan = $request->get('tujuan');

        $events->save(); //save data

        return redirect('/events')->with('success', 'Event berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = events::find($id);
        $events->delete();

        return redirect('events')->with('success', 'Event sudah berhasil dihapus');
    }
}
