<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Update Category</h1>

    <form action="{{ route('category.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="name" value="{{ $category->name }}" name="name" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="description" class="block text-sm font-medium text-gray-700">Description: </label>
            <input type="description" value="{{ $category->description }}" name="description" id="description" @error('description') style="border-color: red;"@enderror>
            @error('description')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        </div>
        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</x-Layout>