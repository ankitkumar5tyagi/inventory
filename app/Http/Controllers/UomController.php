<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uoms = Uom::all();
        return view('uom.index', compact('uoms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'code' => 'required|max:8|unique:uoms',
            'name' => 'required'
        ]);
        Uom::create($field);
        return redirect()->route('uom.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Uom $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uom $uom)
    {
        return view('uom.edit', compact('uom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uom $uom)
    {
        $field = $request->validate([
            'code' => ['required', Rule::unique('uoms')->ignore($uom->id)],
            'name' => 'required'
        ]);
        $uom->update($field);
        return redirect()->route('uom.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uom $uom)
    {
        $uom->delete();
        return redirect()->route('uom.index');
    }
}
