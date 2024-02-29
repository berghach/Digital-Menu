<x-Awner-layout>
@include('base')
@role('Awner')
<div style="text-align: left;" class="mx-5 mt-5">
    <a class="c-success" href="{{ route('itemForm') }}" style="width:20%; display: inline-block; text-decoration: none; background-color: #28a745; color: #fff; padding: 4px 8px; border-radius: 3px; font-size: 20px;">
        <img src="{{ asset('helps/images/sub.png') }}" style="width: 14%; display: inline-block; vertical-align: middle;" alt="">                 
        <span style="display: inline-block; vertical-align: middle;">Add Items</span>
    </a>
</div>
@endrole
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                </div>
                @role('Awner')

                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <form action="{{ route('items.destroy', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                @endrole
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-Awner-layout>

