<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Vouchers</h1>
    <a class="btn" href="{{ route('voucher.create') }}">Add New Voucher</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($vouchers as $voucher)
        <tr>
            <td><a href="{{ route('voucher.show', $voucher) }}">{{ $voucher->name }}</td>
            <td>{{$voucher->type}}</td>
            <td><a class="warningbtn" href="{{ route('voucher.edit', $voucher) }}">Edit</a></td>
            <td><form action="{{route('voucher.destroy', $voucher)}}" method="post">
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