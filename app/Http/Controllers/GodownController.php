<?php

namespace App\Http\Controllers;

use App\Models\godown;
use Illuminate\Http\Request;

class GodownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $godowns = Godown::all();
        return view('godown.index', compact('godowns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('godown.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        Godown::create($fields);
        return redirect()->route('godown.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(godown $godown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(godown $godown)
    {
        return view('godown.edit', compact('godown'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, godown $godown)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $godown->update($fields);
        return redirect()->route('godown.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(godown $godown)
    {
        $godown->delete();
        return redirect()->route('godown.index');
    }
}
