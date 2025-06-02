<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Suppliers</h1>
    <a class="btn" href="{{ route('supplier.create') }}">Add Supplier</a>
    <a class="btn" href="{{ route('suppliers.export') }}">Download</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Company</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($suppliers as $supplier)
        <tr>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->email}}</td>
            <td>{{$supplier->phone}}</td>
            <td>{{$supplier->address}}</td>
            <td>{{$supplier->company}}</td>
            <td>{{($supplier->status == 1)? 'Active': 'Inactive'}}</td>
            <td><a class="warningbtn" href="{{ route('supplier.edit', $supplier) }}">Edit</a></td>
            <td><form action="{{route('supplier.destroy', $supplier)}}" method="post">
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