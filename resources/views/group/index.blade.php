<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Groups</h1>
    <a class="btn" href="{{ route('group.create') }}">Add Group</a>
    
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
    @foreach ($groups as $group)
        <tr>
            <td>{{$group->name}}</td>
            <td>{{$group->description}}</td>
            <td><a class="warningbtn" href="{{ route('group.edit', $group) }}">Edit</a></td>
            <td><form action="{{route('group.destroy', $group)}}" method="post">
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