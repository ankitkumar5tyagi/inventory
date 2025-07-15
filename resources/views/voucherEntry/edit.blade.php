<x-Layout>
    <div class="w-4/5 m-auto p-10">
        <h1>Update {{ $voucherEntry->voucher->name }}</h1>

        <form action="{{ route('voucherEntry.update', $voucherEntry) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="voucher_id" value="{{ $voucherEntry->voucher_id }}">

            <div class="inputdiv">
                <label>Date:</label>
                <input type="date" name="date" value="{{ $voucherEntry->date }}">
                @error('date') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="inputdiv">
                <label>Voucher No:</label>
                <input type="text" name="voucher_no" value="{{ $voucherEntry->voucher_no }}">
                @error('voucher_no') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="inputdiv">
                <label>Party:</label>
                <select name="party_id">
                    <option value="">Select Party</option>
                    @foreach ($parties as $party)
                        <option value="{{ $party->id }}" {{ $voucherEntry->party_id == $party->id ? 'selected' : '' }}>
                            {{ $party->name }}
                        </option>
                    @endforeach
                </select>
                @error('party_id') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="inputdiv">
                <label>Note:</label>
                <input type="text" name="note" value="{{ $voucherEntry->note }}">
                @error('note') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            {{-- Voucher Items --}}
            <h2 class="font-bold mt-6">Voucher Items</h2>
            <div id="voucherItems-container">
                @foreach ($voucherEntry->voucherItem as $index => $item)
                    <div class="voucherItem-row flex items-end-safe">
                        <div class="inputdiv">
                            <label>Item:</label>
                            <select name="voucherItems[{{ $index }}][item_id]" onchange="updateUOM(this)">
                                <option value="">Select</option>
                                @foreach ($items as $i)
                                    <option value="{{ $i->id }}" data-uom="{{ $i->uom->name }}"
                                        {{ $item->item_id == $i->id ? 'selected' : '' }}>
                                        {{ $i->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputdiv">
                            <label>Qty:</label>
                            <input type="text" name="voucherItems[{{ $index }}][quantity]" value="{{ $item->quantity }}">
                        </div>

                        <div class="inputdiv">
                            <label>UOM:</label>
                            <input type="text" class="uom-input" name="voucherItems[{{ $index }}][uom]" value="{{ $item->uom }}">
                        </div>

                        <div class="inputdiv">
                            <label>Rate:</label>
                            <input type="text" name="voucherItems[{{ $index }}][rate]" value="{{ $item->rate }}">
                        </div>

                        <button type="button" class="btn" onclick="this.closest('.voucherItem-row').remove()">❌</button>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                <button type="button" class="btn" onclick="addTransaction()">➕ Add Item</button>
            </div>

            <div class="mt-4">
                <input type="submit" class="btn" value="Update Entry">
            </div>
        </form>
    </div>

    <script>
        let transactionIndex = {{ count($voucherEntry->voucherItem) }};

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
