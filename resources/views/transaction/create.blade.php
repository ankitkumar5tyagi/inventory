<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Add New Transaction</h1>

    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf
        <div class="inputdiv">
            <label for="date" class="block text-sm font-medium text-gray-700">Date: </label>
            <input type="date" name="date" value="{{ old('date') }}" id="date" @error('date') style="border-color: red;"@enderror>
            @error('date')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="voucher_id" class="block text-sm font-medium text-gray-700">Voucher: </label>
            <select type="text" value="{{ old('voucher_id') }}" name="voucher_id" id="voucher_id" @error('voucher_id') style="border-color: red;"@enderror onchange="updateForm()">
            @foreach ($vouchers as $voucher)
                <option value="{{ $voucher->id }}">{{$voucher->name}}</option>
            @endforeach   
                
            </select>
            @error('voucher_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv" id="consumer" style="display: none">
            <label for="consumer_id" class="block text-sm font-medium text-gray-700">Consumer: </label>
            <select type="text" name="consumer_id" value="{{ old('consumer_id') }}" id="consumer_id" @error('cosumer_id') style="border-color: red;"@enderror>
                <option value="">Select Consumer</option>
            @foreach ($consumers as $consumer)
                <option value="{{ $consumer->id }}">{{$consumer->name}}</option>
            @endforeach
            </select>
                @error('consumer_id')
                <span class="text-red-600">{{$message}}</span>
                @enderror
        </div>
        
        <div class="inputdiv" id="party" style="display: none">
            <label for="supplier_id" class="block text-sm font-medium text-gray-700">Party: </label>
            <select type="text" name="supplier_id" value="{{ old('supplier_id') }}" id="supplier_id" @error('supplier_id') style="border-color: red;"@enderror>
               <option value="">Select Party</option>
                @foreach ($parties as $party)
                    <option value="{{ $party->id }}">{{$party->company . ' - ' . $party->name}}</option>
                @endforeach
            </select>
            @error('supplier_id')
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
            <label for="uom" class="block text-sm font-medium text-gray-700">UOM: </label>
            <input type="text" name="uom" value="{{ old('uom') }}" id="uom" @error('uom') style="border-color: red;"@enderror readonly>
            @error('uom')
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
            <label for="bill_order_no" class="block text-sm font-medium text-gray-700">Invoice Number: </label>
            <input type="text" name="bill_order_no" value="{{ old('bill_order_no') }}" id="bill_order_no" @error('bill_order_no') style="border-color: red;"@enderror>
            @error('bill_order_no')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="note" class="block text-sm font-medium text-gray-700">Note: </label>
            <input type="text" name="note" value="{{ old('note') }}" id="note" @error('note') style="border-color: red;"@enderror>
            @error('note')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
    
        <div class="inputdiv">
        <input class="btn float-left" type="submit" value="Submit">
        </div>
    </form>
    <script>
         function updateUOM(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const uom = selectedOption.getAttribute('data-uom');
        document.getElementById('uom').value = uom || '';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const itemSelect = document.getElementById('item_id');
        if (itemSelect.value) {
            updateUOM(itemSelect);
        }
    });

    function updateForm() {
       const itemSelect = document.getElementById('type');
        if(itemSelect.value == "Issuance" || itemSelect.value == "Reciept") {
            document.querySelector('#party').style.display = "none";
            document.querySelector('#consumer').style.display = "block";
        }
        else if (itemSelect.value == "Purchase" || itemSelect.value == "Purchase Return") {
            document.querySelector('#consumer').style.display = "none"
            document.querySelector('#party').style.display = "block"
        }
        else {
            document.querySelector('#consumer').style.display = "none"
            document.querySelector('#party').style.display = "none"
        }
    }
    </script>
    </div>
</x-Layout>