<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\committees;

class CommitteesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committees = \App\committees::all();

        return view('committees.index', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = \App\events::all();

        return view('committees.insert', compact('events'));
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

            'jabatan' => 'required',
            'id_user' => 'required',
            'password' => 'required',
            'nama' => 'required',

            'tanggung_jawab' => 'required',
        ]);

        $committees = new committees([
            'id_events' => $request->get('id_events'),

            'jabatan' => $request->get('jabatan'),
            'id_user' => $request->get('id_user'),
            'password' => $request->get('password'),
            'nama' => $request->get('nama'),

            'tanggung_jawab' => $request->get('tanggung_jawab')
        ]);

        $committees->save();

        return redirect('committees')->with('success', 'Panitia baru ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $committees = committees::find($id);
        $events = \App\events::all();

        return view('committees.edit', compact('committees', 'events'));
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

            'jabatan' => 'required',
            'id_user' => 'required',
            'password' => 'required',
            'nama' => 'required',

            'tanggung_jawab' => 'required',
        ]);

        //collecting the data
        $committees = committees::find($id);
        $committees->id_events = $request->get('id_events');
        $committees->jabatan = $request->get('jabatan');
        $committees->id_user = $request->get('id_user');
        $committees->password = $request->get('password');
        $committees->nama = $request->get('nama');
        $committees->tanggung_jawab = $request->get('tanggung_jawab');

        $committees->save(); //save data

        return redirect('/committees')->with('success', 'Panitia berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $committees = committees::find($id);
        $committees->delete();

        return redirect('committees')->with('success', 'Panitia sudah berhasil dihapus');
    }
}
