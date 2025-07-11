<?php

namespace App\Http\Controllers;

use App\Models\partyGroup;
use Illuminate\Http\Request;

class PartyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partyGroups = PartyGroup::all();
        return view('partyGroup.index', ['partyGroups'=> $partyGroups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partyGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required'
        ]);
        PartyGroup::create($fields);
        return redirect()->route('partyGroup.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(partyGroup $partyGroup)
    {
        $partyGroup->load('party');
        return view('partyGroup.show', compact('partyGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(partyGroup $partyGroup)
    {
        return view('partyGroup.edit', ['partyGroup'=>$partyGroup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, partyGroup $partyGroup)
    {
        $fields = $request->validate([
            'name'=>'required'
        ]);
        $partyGroup->update($fields);
        return redirect()->route('partyGroup.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(partyGroup $partyGroup)
    {
        $partyGroup->delete();
        return redirect()->route('partyGroup.index');
    }
}
