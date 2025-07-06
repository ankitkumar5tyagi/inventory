<x-Layout>
    <div class=" flex-1 h-20 m-auto p-10">
    <h1>Items</h1>
    <a class="btn" href="{{ route('item.create') }}">Add Item</a>
    <a class="btn" href="#">Download</a>
    
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>UOM</th>
                <th>Description</th>
                <th>Group</th>
                <th>Category</th>
                <th>Opening Qty</th>
                <th>Opening Price</th>
                <th>Reorder Level</th>
                <th>Godown</th>
                <th>Location</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->uom->code}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->group->name}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->opening}}</td>
            <td>{{$item->opening_price}}</td>
            <td>{{$item->reorder_level}}</td>
            <td>{{$item->godown->name}}</td>
            <td>{{$item->location}}</td>
            <td>{{($item->status == 1)? 'Active': 'Inactive'}}</td>
            <td><a class="warningbtn" href="{{ route('item.edit', $item) }}">Edit</a></td>
            <td><form action="{{route('item.destroy', $item)}}" method="post">
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