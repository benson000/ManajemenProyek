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

            'tujuan' => 'required',
            'approval' => 'required',

            'proposal' => 'required|mimes:pdf|max:40000'
        ]);

        //get image name and store in local
        $file_request = $request->file('proposal');
        $fileName = $file_request->getClientOriginalName(); //get name
        $file_request->move(
            public_path('/UploadedFiles'), 
            $fileName
        );

        //insert
        $events = new events([
            'id_events' => $request->get('id_events'),
            'name' => $request->get('name'),

            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),

            'place' => $request->get('place'),
            'theme' => $request->get('theme'),
            'category' => $request->get('category'),

            'tujuan' => $request->get('tujuan'),
            'approval' => 'BELUM DISETUJUI', //default
            'proposal' => $fileName
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

            'tujuan' => 'required',
            'approval' => 'required'
        ]);

        //collecting the data
        $events = events::find($id);

        $events->id_events = $request->input('id_events');
        $events->name = $request->input('name');

        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->place = $request->input('place');
        $events->theme = $request->input('theme');
        $events->category = $request->input('category');

        $events->tujuan = $request->input('tujuan');
        $events->approval = $request->input('approval');

        if($request->hasFile('proposal')){
            //get image name and store in local
            $file_request = $request->file('proposal');
            $fileName = $file_request->getClientOriginalName(); //get name
            $file_request->move(
                public_path('/UploadedFiles'), 
                $fileName
            );

            //store to array
            $events->proposal = $fileName;
        }

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

    public function downloadProposal($fileName){
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/UploadedFiles/".$fileName;   

        return response()->download($file, $fileName, $headers);
    }
}
