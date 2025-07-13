<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Voucher Items</h1>
    <a class="btn" href="{{ route('voucherItem.create') }}">Add VoucherItem</a>
    <a class="btn" href="#">Download</a>
    
    <table>
        <thead>
            <tr>
                <th>Voucher Entry</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>UOM</th>
                <th>Rate</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($voucherItems as $voucherItem)
        <tr>
            <td>{{$voucherItem->voucherEntry->voucher_no}}</td>
            <td>{{$voucherItem->item->code. "-" .$voucherItem->item->name}}</td>
            <td>{{$voucherItem->quantity}}</td>
            <td>{{$voucherItem->uom}}</td>
            <td>{{$voucherItem->rate}}</td>
            
            <td><a class="warningbtn" href="{{ route('voucherItem.edit', $voucherItem) }}">Edit</a></td>
            <td><form action="{{route('voucherItem.destroy', $voucherItem)}}" method="post">
                @csrf
                @method('DELETE')
            <button class="dangerbtn" type="submit">Delete</button> 
            </form></td>
        </tr>
    @endforeach
        </tbody>
    </table>
    </div>
</x-Layout>