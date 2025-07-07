<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1>Edit Item</h1>

    <form action="{{ route('item.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="inputdiv">
            <label for="code" class="block text-sm font-medium text-gray-700">Code: </label>
            <input type="text" name="code" value="{{ $item->code }}" id="code" @error('code') style="border-color: red;"@enderror>
            @error('code')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="name" class="block text-sm font-medium text-gray-700">Name: </label>
            <input type="text" value="{{ $item->name }}" name="name" id="name" @error('name') style="border-color: red;"@enderror>
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="uom_id" class="block text-sm font-medium text-gray-700">UOM: </label>
            <select name="uom_id" id="uom_id" @error('uom_id') style="border-color: red;"@enderror>
            @foreach ($uoms as $uom)
                <option value="{{ $uom->id }}" {{ $uom->id == $item->uom_id ? 'selected' : '' }}>{{$uom->name}}</option>
            @endforeach
            </select>
            @error('uom_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="description" class="block text-sm font-medium text-gray-700">Description: </label>
            <input type="text" name="description" value="{{ $item->description }}" id="description" @error('description') style="border-color: red;"@enderror>
            @error('description')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="group_id" class="block text-sm font-medium text-gray-700">Group: </label>
            <select name="group_id" id="group_id" @error('category_id') style="border-color: red;"@enderror>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ $group->id == $item->group_id ? 'selected' : '' }}>{{$group->name}}</option>
                @endforeach
            </select>
            @error('group_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category: </label>
            <select type="text" name="category_id" value="{{ $item->category_id }}" id="category_id" @error('category_id') style="border-color: red;"@enderror>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="opening" class="block text-sm font-medium text-gray-700">Opening Quantity: </label>
            <input type="text" name="opening" value="{{$item->opening }}" id="opening" @error('category_id') style="border-color: red;"@enderror>
            @error('opening')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="opening_price" class="block text-sm font-medium text-gray-700">Opening Price: </label>
            <input type="text" name="opening_price" value="{{ $item->opening_price }}" id="opening_price" @error('opening_price') style="border-color: red;"@enderror>
            @error('opening_price')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="reorder_level" class="block text-sm font-medium text-gray-700">Reorder Level: </label>
            <input type="text" name="reorder_level" value="{{ $item->reorder_level }}" id="reorder_level" @error('category_id') style="border-color: red;"@enderror>
            @error('reorder_level')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        
        <div class="inputdiv">
            <label for="godown_id" class="block text-sm font-medium text-gray-700">Godown: </label>
            <select type="text" name="godown_id" value="{{ $item->godown_id }}" id="godown_id" @error('category_id') style="border-color: red;"@enderror>
                @foreach ($godowns as $godown)
                    <option value="{{ $godown->id }}">{{$godown->name}}</option>
                @endforeach
            </select>
            @error('godown_id')
                <span class="text-red-600">{{$message}}</span>_id
            @enderror
        </div>
        <div class="inputdiv">
            <label for="location" class="block text-sm font-medium text-gray-700">Location: </label>
            <input type="text" name="location" value="{{ $item->location }}" id="location" @error('location') style="border-color: red;"@enderror>
            @error('location')
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