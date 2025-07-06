<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Godowns</h1>
    <a class="btn" href="{{ route('godown.create') }}">Add Godown</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($godowns as $godown)
        <tr>
            <td>{{$godown->name}}</td>
            <td>{{$godown->description}}</td>
            <td><a class="warningbtn" href="{{ route('godown.edit', $godown) }}">Edit</a></td>
            <td><form action="{{route('godown.destroy', $godown)}}" method="post">
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