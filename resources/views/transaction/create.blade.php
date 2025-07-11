<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Add New Transaction</h1>

    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf

        <div class="inputdiv">
            <label for="voucherEntry_id" class="block text-sm font-medium text-gray-700">Voucher: </label>
            <select type="text" value="{{ old('voucherEntry_id') }}" name="voucherEntry_id" id="voucherEntry_id" @error('voucherEntry_id') style="border-color: red;"@enderror onchange="updateForm()">
            @foreach ($vouchers as $voucher)
                <option value="{{ $voucher->id }}">{{$voucher->name}}</option>
            @endforeach   
            </select>
            @error('voucherEntry_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="item_id" class="block text-sm font-medium text-gray-700">Item: </label>
            <select type="text" name="item_id" value="{{ old('item_id') }}" id="item_id" @error('item_id') style="border-color: red;"@enderror onchange="updateUOM(this)">
                <option value="">Select an Item</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" data-uom="{{ $item->uom->name }}">{{$item->code}}</option>
                @endforeach
            </select>
            @error('item_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity: </label>
            <input type="text" name="quantity" value="{{ old('quantity') }}" id="quantity" @error('quantity') style="border-color: red;"@enderror>
            @error('quantity')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="uom" class="block text-sm font-medium text-gray-700">UOM: </label>
            <input type="text" name="uom" value="{{ old('uom') }}" id="uom" @error('uom') style="border-color: red;"@enderror readonly>
            @error('uom')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="rate" class="block text-sm font-medium text-gray-700">Rate: </label>
            <input type="text" name="rate" value="{{ old('rate') }}" id="rate" @error('rate') style="border-color: red;"@enderror>
            @error('rate')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
    
        <div class="inputdiv">
        <input class="btn float-left" type="submit" value="Submit">
        </div>
    </form>
    </div>
</x-Layout>