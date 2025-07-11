<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Parties>{{$partyGroup->name}}</h1>
    <a class="btn" href="/addParty?partyGroup={{ $partyGroup->id }}">Add New {{$partyGroup->name}}</a>
   <table>
        <thead>
            <tr>
                <th>Party Group</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Company</th>
                <th>PAN No</th>
                <th>GST No</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($partyGroup->party as $party)
        <tr>
            <td>{{$party->partyGroup->name}}</td>
            <td>{{$party->name}}</td>
            <td>{{$party->email}}</td>
            <td>{{$party->phone}}</td>
            <td>{{$party->address}}</td>
            <td>{{$party->company}}</td>
            <td>{{$party->pan}}</td>
            <td>{{$party->gst}}</td>
            <td>{{($party->status == 1)? 'Active': 'Inactive'}}</td>
            <td><a class="warningbtn" href="{{ route('party.edit', $party) }}">Edit</a></td>
            <td><form action="{{route('party.destroy', $party)}}" method="post">
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