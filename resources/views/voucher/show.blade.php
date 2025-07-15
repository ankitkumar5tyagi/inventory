<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Voucher>{{$voucher->name}}</h1>
    <a class="btn" href="/addVoucherEntry?voucher={{ $voucher->id }}">Add New {{$voucher->name}}</a>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Voucher No</th>
                <th>Party</th>
                <th>Note</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($voucher->voucherEntry as $voucherEntry)
        <tr>
            <td>{{$voucherEntry->date}}</td>
            <td><a href="{{ route('voucherEntry.show', $voucherEntry) }}">{{ $voucherEntry->voucher_no }}</a></td>
            <td>{{$voucherEntry->party->company}}</td>
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