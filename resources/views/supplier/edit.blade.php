<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Update Supplier</h1>

    <form action="{{ route('supplier.update', $supplier) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="text" name="name" value="{{ $supplier->name }}" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="email" class="block text-sm font-medium text-gray-700">Email: </label>
            <input type="text" name="email" value="{{ $supplier->email }}" id="email" @error('email') style="border-color: red;"@enderror>
            @error('email')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone: </label>
            <input type="text" name="phone" value="{{ $supplier->phone }}" id="phone" @error('phone') style="border-color: red;"@enderror>
            @error('phone')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="address" class="block text-sm font-medium text-gray-700">Address: </label>
            <input type="text" name="address" value="{{ $supplier->address }}" id="address" @error('address') style="border-color: red;"@enderror>
            @error('address')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="company" class="block text-sm font-medium text-gray-700">Company: </label>
            <input type="text" name="company" value="{{ $supplier->company }}" id="company" @error('company') style="border-color: red;"@enderror>
            @error('company')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="status" class="block text-sm font-medium text-gray-700">Status: </label>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" class="w-4 h-4" id="statusbox" name="status" value="{{ ($supplier->status)? $supplier->status : "1" }}" {{ ($supplier->status == 1)? "checked" : ""}} @error('status') style="border-color: red;" @enderror>
            <label for="status" id="status" class="block text-sm font-medium text-green-700">Active! </label>
            @error('status')
                <span class="text-red-600">{{$message}}</span>
            @enderror

            <script>
               let status = document.getElementById('status');
               let status_value = {{ $supplier->status ?? 0 }};
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