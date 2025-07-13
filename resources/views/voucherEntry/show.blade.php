<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Voucher>{{$voucherEntry->voucher->name}}>{{$voucherEntry->voucher_no}}</h1>
    <a class="btn" href="{{ route('transaction.create') }}">Add New Voucher Item</a>
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
        
        @foreach ($voucherEntry->transaction as $transaction)
        <tr>
            <td>{{$transaction->item->code. "-" .$transaction->item->name}}</td> 
            <td>{{$transaction->quantity}}</td> 
            <td>{{$transaction->uom}}</td> 
            <td>{{$transaction->rate}}</td> 
            <td><a class="warningbtn" href="{{ route('transaction.edit', $transaction) }}">Edit</a></td>
            <td><form action="{{route('transaction.destroy', $transaction)}}" method="post">
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