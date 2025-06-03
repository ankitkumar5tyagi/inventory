<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Edit UOM</h1>

    <form action="{{ route('uom.update', $uom) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="inputdiv">
            <label for="code" class="block text-sm font-medium text-gray-700">Code: </label>
            <input type="code" value="{{ $uom->code }}" name="code" id="code" @error('code') style="border-color: red;"@enderror>
            @error('code')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="name" value="{{ $uom->name }}" name="name" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</x-Layout>