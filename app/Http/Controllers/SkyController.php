<?php

namespace App\Http\Controllers;

use App\Sky;
use Illuminate\Http\Request;

class SkyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skies = Sky::all();

        return view('index', compact('skies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|alpha_num',
            'quantity' => 'required|numeric',
        ]);
        $book = Sky::create($validatedData);

        return redirect('/sky')->with('success', 'Book is successfully saved');
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
        $sky = Sky::findOrFail($id);

        return view('edit', compact('sky'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|alpha_num',
            'quantity' => 'required|numeric',
        ]);
        Sky::whereId($id)->update($validatedData);

        return redirect('/sky')->with('success', 'Sky is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sky = Sky::findOrFail($id);
        $sky->delete();

        return redirect('/sky')->with('success', 'Sky is successfully deleted');
    }
}
