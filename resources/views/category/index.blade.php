<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>Categories</h1>
    <a class="btn" href="{{ route('category.create') }}">Add Category</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->code}}</td>
            <td>{{$category->description}}</td>
            <td>{{($category->status == 1)? 'Active': 'Inactive'}}</td>
            <td><a class="warningbtn" href="{{ route('category.edit', $category) }}">Edit</a></td>
            <td><form action="{{route('category.destroy', $category)}}" method="post">
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