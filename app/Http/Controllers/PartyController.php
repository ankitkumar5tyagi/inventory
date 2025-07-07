<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parties = Party::all();
        return view('party.index' , ['parties' => $parties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('party.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|max:20',
            'email'=> 'nullable|email|unique:parties',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable',
            'company' => 'nullable',
            'pan' => 'nullable',
            'gst' => 'nullable',
            'status' => 'nullable'
        ]);
         
        $party = new Party();
        $party->name = $request->name;
        $party->email = $request->email;
        $party->phone = $request->phone;
        $party->address = $request->address;
        $party->company = $request->company;
        $party->pan = $request->pan;
        $party->gst = $request->gst;
        $party->status = $request->status;
        $party->save();
        return redirect()->route('party.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        return view('party.edit', compact('party'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Party $party)
    {
        $field = $request->validate([
            'name' => 'required|max:20',
            'email'=> 'nullable|email',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable',
            'company' => 'nullable',
            'pan' => 'nullable',
            'gst' => 'nullable',
            'status' => 'nullable'
        ]);

        $party->update($field);
        return redirect()->route('party.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        $party->delete();
        return redirect()->route('party.index');
    }

    public function export()
    {
        $parties = Party::all();

        $filename = "parties.csv";
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Name', 'Email', 'Phone', 'Address', 'Company', 'Status'];

        $callback = function () use ($parties, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); // Header row

            foreach ($parties as $party) {
                fputcsv($file, [
                    $party->name,
                    $party->email,
                    $party->phone,
                    $party->address,
                    $party->company,
                    $party->status ? 'Active' : 'Inactive' // Optional status label
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

}
