<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index' , ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|max:20',
            'email'=> 'nullable|email|unique:suppliers',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable',
            'company' => 'nullable',
            'status' => 'nullable'
        ]);
         
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->company = $request->company;
        $supplier->status = $request->status;
        $supplier->save();
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $field = $request->validate([
            'name' => 'required|max:20',
            'email'=> 'nullable|email',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable',
            'company' => 'nullable',
            'status' => 'nullable'
        ]);

        $supplier->update($field);
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index');
    }

    public function export()
    {
        $suppliers = Supplier::all();

        $filename = "suppliers.csv";
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Name', 'Email', 'Phone', 'Address', 'Company', 'Status'];

        $callback = function () use ($suppliers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); // Header row

            foreach ($suppliers as $supplier) {
                fputcsv($file, [
                    $supplier->name,
                    $supplier->email,
                    $supplier->phone,
                    $supplier->address,
                    $supplier->company,
                    $supplier->status ? 'Active' : 'Inactive' // Optional status label
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

}
