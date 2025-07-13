<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Voucher>{{$voucherEntry->voucher->name}}>{{$voucherEntry->voucher_no}}</h1>
    <a class="btn" href="{{ route('voucherItem.create') }}">Add New Voucher Item</a>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>UOM</th>
                <th>Rate</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach ($voucherEntry->voucherItem as $voucherItem)
        <tr>
            <td>{{$voucherItem->item->code. "-" .$voucherItem->item->name}}</td> 
            <td>{{$voucherItem->quantity}}</td> 
            <td>{{$voucherItem->uom}}</td> 
            <td>{{$voucherItem->rate}}</td> 
            <td><a class="warningbtn" href="{{ route('voucherEntry.edit', $voucherItem) }}">Edit</a></td>
            <td><form action="{{route('voucherEntry.destroy', $voucherItem)}}" method="post">
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