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
            <label for="code" class="block text-sm font-medium text-gray-700">Code: </label>
            <input type="code" value="{{ $category->code }}" name="code" id="code" @error('code') style="border-color: red;"@enderror>
            @error('code')
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

        <div class="inputdiv">
            <label for="status" class="block text-sm font-medium text-gray-700">Status: </label>
            <input type="hidden" value="0" name="status">
            <input type="checkbox" name="status" id="statusbox" value="{{ ($category->status)? $category->status : "1" }}" {{ ($category->status == 1)? "checked" : ""}} @error('status') style="border-color: red;" @enderror>
            <label for="status" id="status" class="block text-sm font-medium"></label>
            @error('status')
                <span class="text-red-600">{{$message}}</span>
            @enderror

            <script>
               let status = document.getElementById('status');
               let status_value = {{ $category->status ?? 0 }};
               if (status_value == 1) {
                status.innerText = "Active! Uncheck to Deactivate"
               }
               else {
                status.innerText = "Inactive! Check to Activate"
               }
            </script>
        </div>
        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</x-Layout>