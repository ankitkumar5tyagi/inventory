<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Party;
use App\Models\VoucherItem;
use App\Models\Voucher;
use App\Models\VoucherEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voucherEntries = VoucherEntry::with('Party');
        return view('voucherEntry.index', ['voucherEntries' => $voucherEntries]);
    }

    public function addVoucherEntry(Request $request) 
    {
        $voucherId = $request->get('voucher');
        $voucher = Voucher::findOrFail($voucherId);
        $parties = Party::all();
        $items = Item::all();
        return view('voucherEntry.create', compact('voucher','parties','items'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parties = Party::all();
        return view('voucherEntry.create', compact('parties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $fields = $request->validate([
    //     'voucher_id' => 'required|exists:vouchers,id',
    //     'date' => 'required|date',
    //     'voucher_no' => 'required|string|max:255',
    //     'party_id' => 'required|string|max:255',
    //     'note' => 'nullable|string|max:1000',
    // ]);
    // $user = Auth::user();
    // $user->voucherEntry()->create($fields);
    // return redirect()->route('voucher.show', $request->voucher_id);
    // }
    public function store(Request $request)
{
    $validated = $request->validate([
        'voucher_id' => 'required|exists:vouchers,id',
        'date' => 'required|date',
        'voucher_no' => 'required|string',
        'party_id' => 'required|exists:parties,id',
        'note' => 'nullable|string',
        'voucherItems' => 'required|array|min:1',
        'voucherItems.*.item_id' => 'required|exists:items,id',
        'voucherItems.*.quantity' => 'required|numeric|min:0.01',
        'voucherItems.*.uom' => 'required|string',
        'voucherItems.*.rate' => 'required|numeric|min:0',
    ]);

    $voucherEntry = Auth::user()->voucherEntry()->create([
        'voucher_id' => $request->voucher_id,
        'date' => $request->date,
        'voucher_no' => $request->voucher_no,
        'party_id' => $request->party_id,
        'note' => $request->note,
        'user_id'      => Auth::id()
    ]);

    foreach ($request->voucherItems as $txn) {
        VoucherItem::create([
            'voucher_entry_id' => $voucherEntry->id,
            'item_id' => $txn['item_id'],
            'quantity' => $txn['quantity'],
            'uom' => $txn['uom'],
            'rate' => $txn['rate'],
        ]);
    }

    return redirect()->route('voucher.show', $voucherEntry->voucher_id);
}


    /**
     * Display the specified resource.
     */
    public function show(VoucherEntry $voucherEntry)
    {
        $voucherEntry->load('voucherItem.item');
        return view('voucherEntry.show', compact('voucherEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoucherEntry $voucherEntry)
    {
        $voucherEntry->load('voucher');
        $parties = Party::all();
        return view('voucherEntry.edit', compact('parties','voucherEntry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VoucherEntry $voucherEntry)
    {
         $fields = $request->validate([
        'voucher_id' => 'required|exists:vouchers,id',
        'date' => 'required|date',
        'voucher_no' => 'required|string|max:255',
        'party_id' => 'required|string|max:255',
        'note' => 'nullable|string|max:1000',
    ]);
    $voucherEntry->update($fields);
    return redirect()->route('voucher.show', $voucherEntry->voucher_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoucherEntry $voucherEntry)
    {
        $voucherEntry->delete();
        return redirect()->route('voucher.show', $voucherEntry->voucher_id);
    }
}
