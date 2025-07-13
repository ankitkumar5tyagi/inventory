<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Item;
use App\Models\Party;
use App\Models\VoucherItem;
use App\Models\Voucher;
use App\Models\VoucherEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voucherItems = VoucherItem::with(['item','voucherEntry'])->get();
        return view('voucherItem.index', compact('voucherItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $voucherEntries = VoucherEntry::all();
        return view('voucherItem.create', compact('items', 'voucherEntries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'voucher_entry_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'uom' => 'required',
            'rate' => 'required'
        ]);
        VoucherItem::create($fields);
        return redirect()->route('voucherItem.index');
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show(VoucherItem $voucherItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoucherItem $voucherItem)
    {
         $items = Item::all();
        $voucherEntries = VoucherEntry::all();
        return view('voucherItem.edit', compact('voucherItem', 'voucherEntries','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VoucherItem $voucherItem)
    {
        $fields = $request->validate([
            'voucher_entry_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'uom' => 'required',
            'rate' => 'required'
        ]);
        $voucherItem->update($fields);
        return redirect()->route('voucherItem.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoucherItem $voucherItem)
    {
        //
    }
}
