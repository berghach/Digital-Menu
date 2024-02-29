@if(session('success'))
<div class="alert alert-success" role="alert">
{{ session('success') }}
</div>
@endif
@if(session('info'))
    <div class="alert alert-warning">
        {{ session('info') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container py-12">
    <div class="row">
    @foreach($plans as $plan)
        <div class="col-md-4 mt-md-0 mt-4">
            <div class="gallery-demo">
                <a href="#{{ $plan->id }}">
                    <img style="" src="{{ asset('helps/images/blog2.jpg') }}" alt=" " class="img-fluid" />
                    <h4 class="p-mask">{{ $plan->name }} - <span>${{ $plan->price }}</span></h4>
                    <h4 class="p-mask">{{ $plan->duration_in_days }} Day</h4>
                </a>
            </div>
            @role('Admin')
            <a class="btn btn-success mt-3" style="width: 100%" href="{{ route('plans.edit', $plan) }}">   
                <img src="{{ asset('helps/images/sub.png') }}" style="width: 5%; display: inline-block; vertical-align: middle;" alt="">                 
                <span style="display: inline-block; vertical-align: middle;">Edit</span>
            </a>
            <form action="{{ route('plans.destroy', $plan) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn submit mb-4">
                    <img src="{{ asset('helps/images/t2.png') }}" style="width: 6%; display: inline-block; vertical-align: middle;" alt="">
                    <span style="display: inline-block; vertical-align: middle;">Delet</span>
                </button>
            </form>
            @endrole
            @role('Awner')
            <form action="{{ route('operatorsPlan') }}" method="POST">
                @csrf
                <input type="hidden" name="Plan_id" value="{{ $plan->id }}">
                {{-- <input type="hidden" name="Plan_id" value="{{ $plan->duration_in_days }}"> --}}

                <button class="btn btn-warning submit mb-4" type="submit">
                    <img src="{{ asset('helps/images/t1.png') }}" style="width: 5%; display: inline-block; vertical-align: middle;" alt="">
                    <span style="display: inline-block; vertical-align: middle;">Assign Plan</span>
                </button>
            </form>
            
            @endrole
        </div>
    @endforeach
</div>
</div>


