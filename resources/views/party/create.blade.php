<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Add New Party</h1>

    <form action="{{ route('party.store') }}" method="POST">
        @csrf
        
        <div class="inputdiv">
            <label for="party_group_id" class="block text-sm font-medium text-gray-700">Party Group: </label>
            <select name="party_group_id" id="party_group_id" @error('party_group_id') style="border-color: red;"@enderror>
                <option>Select Group</option>
                @foreach ($partyGroups as $parties)
                    <option value="{{ $parties->id }}" {{($parties->id == $partyGroup->id)? "selected" : ""}}>{{$parties->name}}</option>
                @endforeach
            </select>
            @error('party_group_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="text" value="{{ old('name') }}" name="name" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="email" class="block text-sm font-medium text-gray-700">Email: </label>
            <input type="text" name="email" value="{{ old('email') }}" id="email" @error('email') style="border-color: red;"@enderror>
            @error('email')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone: </label>
            <input type="text" name="phone" value="{{ old('phone') }}" id="phone" @error('phone') style="border-color: red;"@enderror>
            @error('phone')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="address" class="block text-sm font-medium text-gray-700">Address: </label>
            <input type="text" name="address" value="{{ old('address') }}" id="address" @error('address') style="border-color: red;"@enderror>
            @error('address')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="company" class="block text-sm font-medium text-gray-700">Company: </label>
            <input type="text" name="company" value="{{ old('company') }}" id="company" @error('company') style="border-color: red;"@enderror>
            @error('company')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="pan" class="block text-sm font-medium text-gray-700">PAN No: </label>
            <input type="text" name="pan" value="{{ old('pan') }}" id="pan" @error('pan') style="border-color: red;"@enderror>
            @error('pan')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <label for="gst" class="block text-sm font-medium text-gray-700">GST No: </label>
            <input type="text" name="gst" value="{{ old('gst') }}" id="gst" @error('gst') style="border-color: red;"@enderror>
            @error('gst')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="status" class="block text-sm font-medium text-gray-700">Status: </label>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" class="w-4 h-4" id="statusbox" name="status" value="1" checked @error('status') style="border-color: red;" @enderror>
            <label for="status" id="status" class="block text-sm font-medium text-green-700">Active! </label>
            @error('status')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</x-Layout>