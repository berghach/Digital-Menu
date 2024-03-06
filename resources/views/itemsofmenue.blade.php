@include('header')

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
