<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Parties</h1>
    <a class="btn" href="{{ route('partyGroup.create') }}">Add New Party Group</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($partyGroups as $partyGroup)
        <tr onclick="window.location='{{ route('partyGroup.show', $partyGroup) }}'" style="cursor: pointer;">
            <td>{{ $partyGroup->name }}</td>
            <td><a class="warningbtn" href="{{ route('partyGroup.edit', $partyGroup) }}" onclick="event.stopPropagation();">Edit</a></td>
            <td>
                <form action="{{ route('partyGroup.destroy', $partyGroup) }}" method="POST" onclick="event.stopPropagation();">
                    @csrf
                    @method('DELETE')
                    <button class="dangerbtn" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
    </div>
</x-Layout>