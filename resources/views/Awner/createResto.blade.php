<x-Awner-layout>
@include('base')
<div class="login-contect py-5">
    <div class="container py-xl-5 py-3">
        <div class="login-body">
            <div class="login p-4 mx-auto">
                <h5 class="text-center mb-4">Create Restaurent</h5>
                @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                    <form action="{{ route('CreateRestaurent') }}" method="post">
                        @csrf
                        <span>Name</span>
                        <input type="text" class="form-control mt-3" name="name">
                        <span>Address</span>
                        <input type="text" class="form-control mt-3" name="address">
                        <span>Hours of work</span>
                        <input type="text" class="form-control mt-3" name="hours_of_operation">
                        <button class="btn btn-success submit mb-4" type="submit">Create Restaurent</button>
                    </form>
            </div>
        </div>
    </div>
</div>
</x-Awner-layout>
