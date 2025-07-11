<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Item;
use App\Models\Party;
use App\Models\Transaction;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['item','party','consumer'])->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parties = Party::all();
        $items = Item::all();
        $vouchers = Voucher::all();
        return view('transaction.create',compact('parties','items', 'vouchers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'date'=>'required|date',
            'type' => 'required',
            'consumer_id' => 'nullable',
            'supplier_id' => 'nullable',
            'item_id' => 'required',
            'uom' => 'required',
            'quantity' => 'required',
            'bill_order_no'=> 'nullable',
            'note' => 'nullable'
        ]);
        $user = Auth::user();
        $user->transaction()->create([
            'date'=> $request->date,
            'type' => $request->type,
            'consumer_id' => $request->consumer_id,
            'supplier_id' => $request->supplier_id,
            'item_id' => $request->item_id,
            'uom' => $request->uom,
            'quantity' => $request->quantity,
            'bill_order_no'=> $request->bill_order_no,
            'note' => $request->note
        ]);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
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
        return view('transaction.edit', $transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
