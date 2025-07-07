<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Transactions</h1>
    <a class="btn" href="{{ route('transaction.create') }}">Add Transaction</a>
    <a class="btn" href="#">Download</a>
    
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Consumer</th>
                <th>Party</th>
                <th>Item</th>
                <th>UOM</th>
                <th>Quantity</th>
                <th>Bill/Order No</th>
                <th>Note</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{$transaction->date}}</td>
            <td>{{$transaction->type}}</td>
            <td>{{$transaction->consumer?->name ?? '-'}}</td>
            <td>{{$transaction->party ? $transaction->party->company . ' - ' . $transaction->party->name : '-'}}</td>
            <td>{{$transaction->item->sku}}</td>
            <td>{{$transaction->uom}}</td>
            <td>{{$transaction->quantity}}</td>
            <td>{{$transaction->bill_order_no}}</td>
            <td>{{$transaction->note}}</td>
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