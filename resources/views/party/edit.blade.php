<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Update Party</h1>

    <form action="{{ route('party.update', $party) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="text" name="name" value="{{ $party->name }}" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="email" class="block text-sm font-medium text-gray-700">Email: </label>
            <input type="text" name="email" value="{{ $party->email }}" id="email" @error('email') style="border-color: red;"@enderror>
            @error('email')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone: </label>
            <input type="text" name="phone" value="{{ $party->phone }}" id="phone" @error('phone') style="border-color: red;"@enderror>
            @error('phone')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="address" class="block text-sm font-medium text-gray-700">Address: </label>
            <input type="text" name="address" value="{{ $party->address }}" id="address" @error('address') style="border-color: red;"@enderror>
            @error('address')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="company" class="block text-sm font-medium text-gray-700">Company: </label>
            <input type="text" name="company" value="{{ $party->company }}" id="company" @error('company') style="border-color: red;"@enderror>
            @error('company')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="pan" class="block text-sm font-medium text-gray-700">PAN No: </label>
            <input type="text" name="pan" value="{{ $party->pan }}" id="pan" @error('pan') style="border-color: red;"@enderror>
            @error('pan')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="gst" class="block text-sm font-medium text-gray-700">GST No: </label>
            <input type="text" name="gst" value="{{ $party->gst }}" id="gst" @error('gst') style="border-color: red;"@enderror>
            @error('gst')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="status" class="block text-sm font-medium text-gray-700">Status: </label>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" class="w-4 h-4" id="statusbox" name="status" value="{{ ($party->status)? $party->status : "1" }}" {{ ($party->status == 1)? "checked" : ""}} @error('status') style="border-color: red;" @enderror>
            <label for="status" id="status" class="block text-sm font-medium text-green-700">Active! </label>
            @error('status')
                <span class="text-red-600">{{$message}}</span>
            @enderror

            <script>
               let status = document.getElementById('status');
               let status_value = {{ $party->status ?? 0 }};
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