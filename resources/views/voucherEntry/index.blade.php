<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Vouchers</h1>
    <a class="btn" href="{{ route('voucherEntry.create') }}">Add New Voucher</a>
    
    <table>
        <thead>
            <tr>
                <th>Voucher</th>
                <th>Date</th>
                <th>Voucher No</th>
                <th>Party</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($voucherEntries as $voucherEntry)
        <tr>
            <td>{{$voucherEntry->voucher_id}}</td>
            <td>{{$voucherEntry->date}}</td>
            <td><a href="{{ route('voucherEntry.show', $voucherEntry) }}">{{ $voucherEntry->voucher_no }}</td>
            <td>{{$voucherEntry->party_id}}</td>
            <td>{{$voucherEntry->note}}</td>
            <td><a class="warningbtn" href="{{ route('voucherEntry.edit', $voucherEntry) }}">Edit</a></td>
            <td><form action="{{route('voucherEntry.destroy', $voucherEntry)}}" method="post">
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