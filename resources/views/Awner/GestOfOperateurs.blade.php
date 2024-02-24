{{-- @foreach($users as $user)
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
@endforeach --}}
<x-Awner-layout>
    @include('base')
    <div class="container py-5">
        <div class="alert alert-danger" role="alert">
            @if(isset($message))
            {{ $message }}
            @endif
        </div>
    </div>
<div class="container py-12">
    <div class="row">
        @isset($users)
    @foreach($users as $user)
        <div class="col-md-4 mt-md-0 mt-4">
            <div class="gallery-demo">
                <a href="#{{ $user->id }}">
                    <img style="" src="{{ asset('helps/images/t4.png') }}" alt=" " class="img-fluid" />
                    {{-- <h4 class="p-mask">{{ $user->name }} - <span>${{ $plan->price }}</span></h4> --}}
                    <h4 class="p-mask">Id: {{ $user->id }}</h4>
                    <h4 class="p-mask">Name: {{ $user->name }} </h4>
                    <h4 class="p-mask">Email: {{ $user->email }} </h4>
                </a>
            </div>
            {{-- @role('Admin')
            <a class="btn btn-success mt-3" style="width: 100%" href="{{ route('plans.edit', $plan) }}">Edit</a>
            <form action="{{ route('plans.destroy', $plan) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn submit mb-4">Delete</button>
            </form>
            @endrole --}}
        </div>
    @endforeach
    @endisset
</div>
</div>
</x-Awner-layout>



