<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Consumers</h1>
    <a class="btn" href="{{ route('consumer.create') }}">Add Consumer</a>
    <a class="btn" href="#">Download</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Location</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($consumers as $consumer)
        <tr>
            <td>{{$consumer->name}}</td>
            <td>{{$consumer->code}}</td>
            <td>{{$consumer->location}}</td>
            <td>{{$consumer->contact_person}}</td>
            <td>{{$consumer->phone}}</td>
            <td>{{($consumer->status == 1)? 'Active': 'Inactive'}}</td>
            <td><a class="warningbtn" href="{{ route('consumer.edit', $consumer) }}">Edit</a></td>
            <td><form action="{{route('consumer.destroy', $consumer)}}" method="post">
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