<?php

namespace App\Http\Controllers;

use App\Models\Party;
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
        return view('voucherEntry.create', compact('voucher','parties'));
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
    public function store(Request $request)
    {
        $fields = $request->validate([
        'voucher_id' => 'required|exists:vouchers,id',
        'date' => 'required|date',
        'voucher_no' => 'required|string|max:255',
        'party_id' => 'required|string|max:255',
        'note' => 'nullable|string|max:1000',
    ]);
    $user = Auth::user();
    $user->voucherEntry()->create($fields);
    return redirect()->route('voucher.show', $request->voucher_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(VoucherEntry $voucherEntry)
    {
        $voucherEntry->load('transaction');
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
