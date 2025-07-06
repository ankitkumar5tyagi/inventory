<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Godown;
use App\Models\Group;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Uom;
use GMP;
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
        $items = Item::with(['category','uom','group','godown'])->get();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generatedCode = $this->generateItemCode();
        $categories = Category::all();
        $godowns = Godown::all();
        $groups = Group::all();
        $uoms = Uom::all();
        return view('item.create', ['godowns' => $godowns, 'groups'=>$groups, 'categories'=> $categories, 'uoms'=>$uoms, 'code'=>$generatedCode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $field = $request->validate([
            'code' => 'required',
            'name' => 'nullable',
            'uom_id' => 'nullable',
            'description' => 'nullable',
            'group_id' => 'nullable',
            'category_id' => 'nullable',
            'opening' => 'nullable',
            'opening_price' => 'nullable',
            'reorder_level' => 'nullable',
            'godown_id' => 'required',
            'location' => 'nullable',
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
        $godowns = Godown::All();
        $uoms = Uom::all();
        $groups = Group::all();
        return view('item.edit', compact('item','suppliers','categories','uoms','godowns', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $field = $request->validate([
            'code' => ['required', Rule::unique('items')->ignore($item->id)],
            'name' => 'nullable',
            'uom_id'   => 'nullable',
            'description' => 'nullable',
            'group_id' => 'nullable',
            'category_id' => 'nullable',
            'opening' => 'nullable',
            'opening_price' => 'nullable',
            'reorder_level' => 'nullable',
            'godown_id' => 'required',
            'location' => 'nullable',
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
