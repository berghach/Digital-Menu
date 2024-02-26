@include('base')
<x-Admin-layout>
<div class="login-contect py-5">
    <div class="container py-xl-5 py-3">
        <div class="login-body">
            <div class="login p-4 mx-auto">
                <h5 class="text-center mb-4">Edit A PLAN</h5>
                    <form action="{{ route('plans.update', $plan) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="text" class="form-control mt-3" name="name" value="{{ $plan->name }}">
                        <input type="number" class="form-control mt-3" name="price" value="{{ $plan->price }}">
                        <input type="number" class="form-control mt-3" name="duration_in_days" value="{{ $plan->duration_in_days }}">
                        <button class="btn btn-success submit mb-4" type="submit">
                            <img src="{{ asset('helps/images/sub.png') }}" style="width: 5%; display: inline-block; vertical-align: middle;" alt="">
                            <span style="display: inline-block; vertical-align: middle;">Update Plan</span>
                        </button>
                     </form>
            </div>
        </div>
    </div>
</div>
</x-Admin-layout>
