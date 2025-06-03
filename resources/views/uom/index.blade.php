<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>UOM</h1>
    <a class="btn" href="{{ route('uom.create') }}">Add UOM</a>
    
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($uoms as $uom)
        <tr>
            <td>{{$uom->code}}</td>
            <td>{{$uom->name}}</td>
            <td><a class="warningbtn" href="{{ route('uom.edit', $uom) }}">Edit</a></td>
            <td><form action="{{route('uom.destroy', $uom)}}" method="post">
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