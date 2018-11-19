<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\budgets;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = \App\budgets::all();

        return view('budgets.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = \App\events::all();

        return view('budgets.insert', compact('events'));
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
            'keterangan' => 'required',
            'saldo' => 'required'
        ]);

        $budgets = new budgets([
            'id_events' => $request->get('id_events'),
            'keterangan' => $request->get('keterangan'),
            'saldo' => $request->get('saldo')
        ]);

        $budgets->save();

        return redirect('budgets')->with('success', 'Budget baru ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budgets = budgets::find($id);
        $events = \App\events::all();

        return view('budgets.edit', compact('budgets', 'events'));
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
            'keterangan' => 'required',
            'saldo' => 'required'
        ]);

        //collecting the data
        $budgets = budgets::find($id);
        $budgets->id_events = $request->get('id_events');
        $budgets->keterangan = $request->get('keterangan');
        $budgets->saldo = $request->get('saldo');

        $budgets->save(); //save data

        return redirect('/budgets')->with('success', 'Budget berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budgets = budgets::find($id);
        $budgets->delete();

        return redirect('budgets')->with('success', 'Budget sudah berhasil dihapus');
    }
}
