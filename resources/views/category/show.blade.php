<x-Layout>
    <div class=" flex-1 h-20 w-4/5 m-auto p-10">
    <h1>{{$category->name}}</h1>
    @foreach ($items as $item)
        <p>{{ $item->name . $item->code }}</p>
    @endforeach
    </div>
</x-Layout>