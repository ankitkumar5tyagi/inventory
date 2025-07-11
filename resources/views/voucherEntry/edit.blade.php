<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Update {{$voucherEntry->voucher->name}}</h1>

    <form action="{{ route('voucherEntry.update', $voucherEntry) }}" method="POST">
        @csrf
        @method('PUT')
            <input type="hidden" value="{{ $voucherEntry->voucher_id }}" name="voucher_id" id="voucher_id" @error('voucher_id') style="border-color: red;"@enderror>
    

        <div class="inputdiv">
            <label for="date" class="block text-sm font-medium text-gray-700">Date: </label>
            <input type="date" value="{{ $voucherEntry->date }}" name="date" id="date" @error('date') style="border-color: red;"@enderror>
            @error('date')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="voucher_no" class="block text-sm font-medium text-gray-700">Voucher No: </label>
            <input type="voucher_no" value="{{ $voucherEntry->voucher_no }}" name="voucher_no" id="voucher_no" @error('voucher_no') style="border-color: red;"@enderror>
            @error('voucher_no')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="party_id" class="block text-sm font-medium text-gray-700">Party: </label>
            <select name="party_id" id="party_id" @error('party_id') style="border-color: red;"@enderror>
                <option>Select Party</option>
                @foreach ($parties as $party)
                   <option value="{{ $party->id }}">{{$party->name}}</option> 
                @endforeach
                
            </select>
            @error('party_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="note" class="block text-sm font-medium text-gray-700">Note: </label>
            <input type="note" value="{{ $voucherEntry->note }}" name="note" id="note" @error('note') style="border-color: red;"@enderror>
            @error('note')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</x-Layout>