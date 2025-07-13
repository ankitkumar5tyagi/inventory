<x-Layout>
    <div class="w-4/5 m-auto p-10">
        <h1>Create New {{ $voucher->name }}</h1>

        <form action="{{ route('voucherEntry.store') }}" method="POST">
            @csrf

            <input type="hidden" name="voucher_id" value="{{ $voucher->id }}">

            <div class="inputdiv">
                <label>Date:</label>
                <input type="date" name="date" value="{{ old('date') }}">
            </div>

            <div class="inputdiv">
                <label>Voucher No:</label>
                <input type="text" name="voucher_no" value="{{ old('voucher_no') }}">
            </div>

            <div class="inputdiv">
                <label>Party:</label>
                <select name="party_id">
                    @foreach ($parties as $party)
                        <option value="{{ $party->id }}">{{ $party->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inputdiv">
                <label>Note:</label>
                <input type="text" name="note" value="{{ old('note') }}">
            </div>

            {{-- VoucherItem Section --}}
            <h2 class="font-bold mt-6">Voucher Items</h2>
            <div id="voucherItems-container">
                <div class="voucherItem-row flex items-end-safe " >
                    <div class="inputdiv">
                        <label>Item:</label>
                        <select name="voucherItems[0][item_id]" onchange="updateUOM(this)">
                            <option value="">Select</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" data-uom="{{ $item->uom->name }}">{{ $item->code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="inputdiv">
                        <label>Qty:</label>
                        <input type="text" name="voucherItems[0][quantity]">
                    </div>

                    <div class="inputdiv">
                        <label>UOM:</label>
                        <input type="text" class="uom-input" name="voucherItems[0][uom]">
                    </div>

                    <div class="inputdiv">
                        <label>Rate:</label>
                        <input type="text" name="voucherItems[0][rate]">
                    </div>

                    <button type="button" class="btn" onclick="this.closest('.voucherItem-row').remove()">❌</button>
                </div>
            </div>
            <div class="mt-4">
                <button type="button" class="btn" onclick="addTransaction()">➕ Add Item</button>
            </div>
            <div class="mt-4">
                <input type="submit" class="btn" value="Submit">
            </div>
        </form>
    </div>

    <script>
        let transactionIndex = 1;

        function addTransaction() {
            const container = document.getElementById('voucherItems-container');

            const row = document.createElement('div');
            row.className = 'voucherItem-row flex items-end-safe';
            row.innerHTML = `
                <div class="inputdiv">
                    <label>Item:</label>
                    <select name="voucherItems[${transactionIndex}][item_id]" onchange="updateUOM(this)">
                        <option value="">Select</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" data-uom="{{ $item->uom->name }}">{{ $item->code }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="inputdiv">
                    <label>Qty:</label>
                    <input type="text" name="voucherItems[${transactionIndex}][quantity]">
                </div>

                <div class="inputdiv">
                    <label>UOM:</label>
                    <input type="text" class="uom-input" name="voucherItems[${transactionIndex}][uom]">
                </div>

                <div class="inputdiv">
                    <label>Rate:</label>
                    <input type="text" name="voucherItems[${transactionIndex}][rate]">
                </div>

                <button type="button" class="btn" onclick="this.closest('.voucherItem-row').remove()">❌</button>
            `;
            container.appendChild(row);
            transactionIndex++;
        }

        function updateUOM(select) {
            const uom = select.options[select.selectedIndex].getAttribute('data-uom');
            const uomInput = select.closest('.voucherItem-row').querySelector('.uom-input');
            if (uomInput) uomInput.value = uom;
        }
    </script>
</x-Layout>
