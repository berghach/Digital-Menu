{{-- @foreach($users as $user)
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
@endforeach --}}
<x-Awner-layout>
    @include('base')

    <div style="text-align: left;" class="mx-5 mt-5">
        <a class="c-success" href="{{ route('operatuerForm') }}" style="width:20%; display: inline-block; text-decoration: none; background-color: #28a745; color: #fff; padding: 4px 8px; border-radius: 3px; font-size: 20px;">
            <img src="{{ asset('helps/images/sub.png') }}" style="width: 14%; display: inline-block; vertical-align: middle;" alt="">                 
            <span style="display: inline-block; vertical-align: middle;">Add Operatuer</span>
        </a>
    </div>
    
    
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
                <h4 class="p-mask">Id: {{ $user->id }}</h4>
                <h4 class="p-mask">Name: {{ $user->name }} </h4>
                <h4 class="p-mask">Email: {{ $user->email }} </h4>
            </a>
        </div>
        @role('Awner')
        <a class="btn btn-success mt-3" style="width: 100%" href="{{ route('awners.edit', $user->id) }}">
            <img src="{{ asset('helps/images/sub.png') }}" style="width: 5%; display: inline-block; vertical-align: middle;" alt="">                 
            <span style="display: inline-block; vertical-align: middle;">Edit</span>
        </a>
        {{-- {{ dd($user->id) }} --}}
        <form action="{{ route('awners.destroy', $user->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn submit mb-4">
                <img src="{{ asset('helps/images/t2.png') }}" style="width: 6%; display: inline-block; vertical-align: middle;" alt="">
                <span style="display: inline-block; vertical-align: middle;">Delet</span>
            </button>
        </form>
        @endrole
    </div>
@endforeach

        </div>
    
    @endisset
</div>
</div>
</x-Awner-layout>



