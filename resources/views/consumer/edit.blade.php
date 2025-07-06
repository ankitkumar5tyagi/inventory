<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Update Department</h1>

    <form action="{{ route('consumer.update', $consumer) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="text" name="name" value="{{ $consumer->name }}" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="code" class="block text-sm font-medium text-gray-700">Code: </label>
            <input type="text" name="code" value="{{ $consumer->code }}" id="code" @error('code') style="border-color: red;"@enderror>
            @error('code')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="location" class="block text-sm font-medium text-gray-700">Location: </label>
            <input type="text" name="location" value="{{ $consumer->location }}" id="location" @error('location') style="border-color: red;"@enderror>
            @error('location')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact Person: </label>
            <input type="text" name="contact_person" value="{{ $consumer->contact_person }}" id="contact_person" @error('contact_person') style="border-color: red;"@enderror>
            @error('contact_person')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="phone" class="block text-sm font-medium text-gray-700">phone: </label>
            <input type="text" name="phone" value="{{ $consumer->phone }}" id="phone" @error('phone') style="border-color: red;"@enderror>
            @error('phone')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="status" class="block text-sm font-medium text-gray-700">Status: </label>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" class="w-4 h-4" id="statusbox" name="status" value="{{ ($consumer->status)? $consumer->status : "1" }}" {{ ($consumer->status == 1)? "checked" : ""}} @error('status') style="border-color: red;" @enderror>
            <label for="status" id="status" class="block text-sm font-medium text-green-700">Active! </label>
            @error('status')
                <span class="text-red-600">{{$message}}</span>
            @enderror

            <script>
               let status = document.getElementById('status');
               let status_value = {{ $consumer->status ?? 0 }};
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