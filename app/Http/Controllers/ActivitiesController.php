<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activities;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = \App\activities::all();

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = \App\events::all();
        return view('activities.insert', compact('events'));
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
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'keterangan' => 'required',
        ]);

        //insert
        $activities = new activities([
            'id_events' => $request->get('id_events'),
            'name' => $request->get('name'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'keterangan' => $request->get('keterangan')
        ]);

        $activities->save();

        return redirect('activities')->with('success', 'Aktivitas baru ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        route('activities.edit', $act->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = activities::find($id);
        $events = \App\events::all();

        return view('activities.edit', compact('activities', 'events'));
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
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'keterangan' => 'required',
        ]);

        //collecting the data
        $activities = activities::find($id);
        $activities->id_events = $request->get('id_events');
        $activities->name = $request->get('name');
        $activities->start_date = $request->get('start_date');
        $activities->end_date = $request->get('end_date');
        $activities->keterangan = $request->get('keterangan');

        $activities->save(); //save data

        return redirect('/activities')->with('success', 'Aktivitas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activities = activities::find($id);
        $activities->delete();

        return redirect('activities')->with('success', 'Data sudah berhasil dihapus');
    }
}
