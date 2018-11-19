<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\participants;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = \App\participants::all();

        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = \App\events::all();
        return view('participants.insert', compact('events'));
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
            'id_peserta' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        //insert
        $participants = new participants([
            'id_events' => $request->get('id_events'),
            'id_peserta' => $request->get('id_peserta'),
            'nama' => $request->get('nama'),
            'password' => $request->get('password'),
            'keterangan' => $request->get('keterangan')
        ]);

        $participants->save();

        return redirect('participants')->with('success', 'Peserta baru ditambahkan');
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
        $participants = participants::find($id);
        $events = \App\events::all();

        return view('participants.edit', compact('participants', 'events'));
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
            'id_peserta' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        //collecting the data
        $participants = participants::find($id);
        $participants->id_events = $request->get('id_events');
        $participants->id_peserta = $request->get('id_peserta');
        $participants->password = $request->get('password');
        $participants->nama = $request->get('nama');
        $participants->keterangan = $request->get('keterangan');

        $participants->save();

        return redirect('participants')->with('success', 'Peserta berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participants = participants::find($id);
        $participants->delete();

        return redirect('participants')->with('success', 'Peserta sudah berhasil dihapus');
    }
}
