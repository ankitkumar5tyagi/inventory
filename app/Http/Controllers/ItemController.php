<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{

    public function generateItemCode()
{
    do {
        $code = strtolower(Str::random(8)); // Generates random 8-char alphanumeric
    } while (Item::where('code', $code)->exists());

    return $code;
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with(['category','supplier'])->get();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generatedCode = $this->generateItemCode();
        $suppliers = Supplier::all();
        $categories = Category::all();
        $uoms = Uom::all();
        return view('item.create', ['categories'=> $categories, 'suppliers'=> $suppliers, 'uoms'=>$uoms, 'code'=>$generatedCode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'code' => 'required|unique:items',
            'name' => 'nullable',
            'sku'  => 'required|unique:items',
            'uom'   => 'nullable',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'supplier_id' => 'nullable',
            'opening' => 'nullable',
            'reorder_level' => 'nullable',
            'price' => 'nullable',
            'status' => 'nullable'
        ]);
        $user = Auth::user();
        $user->item()->create($field);
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        $uoms = Uom::all();
        return view('item.edit', compact('item','suppliers','categories','uoms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $field = $request->validate([
            'code' => ['required', Rule::unique('items')->ignore($item->id)],
            'name' => 'nullable',
            'sku'  => ['required', Rule::unique('items')->ignore($item->id)],
            'uom'   => 'nullable',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'supplier_id' => 'nullable',
            'opening' => 'nullable',
            'reorder_level' => 'nullable',
            'price' => 'nullable',
            'status' => 'nullable'
        ]);
        $item->update($field);
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index');
    }
}
