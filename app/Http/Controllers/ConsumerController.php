<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consumers = Consumer::all();
        return view('consumer.index', ['consumers'=>$consumers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consumer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|max:50',
            'code' => 'required|max:8|unique:consumers,code',
            'location' => 'required|max:50',
            'contact_person' => 'nullable',
            'phone' => 'nullable|digits:10',
            'status' => 'nullable'
        ]);

        Consumer::create($field);
        return redirect()->route('consumer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumer $consumer)
    {
        return view('consumer.edit', ['consumer'=>$consumer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consumer $consumer)
    {
        $field = $request->validate([
            'name' => 'required|max:50',
            'code' => 'required|max:8',
            'location' => 'required|max:50',
            'contact_person' => 'nullable',
            'phone' => 'nullable|digits:10',
            'status' => 'nullable'
        ]);

        $consumer->update($field);
        return redirect()->route('consumer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumer $consumer)
    {
        $consumer->delete();
        return redirect()->route('consumer.index');
    }
}
