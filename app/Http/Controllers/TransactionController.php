<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Item;
use App\Models\Party;
use App\Models\Transaction;
use App\Models\Voucher;
use App\Models\VoucherEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['item','voucherEntry'])->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $voucherEntries = VoucherEntry::all();
        return view('transaction.create', compact('items', 'voucherEntries'));
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
        Transaction::create($fields);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
         $items = Item::all();
        $voucherEntries = VoucherEntry::all();
        return view('transaction.edit', compact('transaction', 'voucherEntries','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $fields = $request->validate([
            'voucher_entry_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'uom' => 'required',
            'rate' => 'required'
        ]);
        $transaction->update($fields);
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
