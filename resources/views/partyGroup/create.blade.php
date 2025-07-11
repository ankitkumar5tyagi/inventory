<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Create New Party Group</h1>

    <form action="{{ route('partyGroup.store') }}" method="POST">
        @csrf
        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="name" value="{{ old('name') }}" name="name" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</x-Layout>