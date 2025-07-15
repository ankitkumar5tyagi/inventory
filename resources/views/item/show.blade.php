<x-Layout>
    <div class=" flex-1 h-20 m-auto p-10">
    <h1>{{$item->code. '-' .$item->name}}</h1>
    <h2>Available Stock: {{$availableQty}}</h2>
    @foreach ($item->voucherItem as $item)
        <p>{{$item->voucherEntry->voucher->name. ' : ' .$item->voucherEntry->date. ' : ' .$item->voucherEntry->voucher_no. ' : ' .$item->item->name. ' : ' .$item->quantity. ' : ' .$item->uom}}</p>
    @endforeach
    </div>
</x-Layout>