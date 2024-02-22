@include('base')
<x-Admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You can Add A PLAN HERE!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="login-contect py-5">
		<div class="container py-xl-5 py-3">
			<div class="login-body">
				<div class="login p-4 mx-auto">
					<h5 class="text-center mb-4">Add A PLAN</h5>
					<form action="{{ route('addPlan') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" placeholder="00,00" required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Days</label>
                            <input type="number" class="form-control" name="duration_in_days" id="password1" placeholder="" required="">
                        </div>
                        <button type="submit" class="btn submit mb-4">ADD Plan</button>
                    </form>                    
				</div>
			</div>
		</div>
	</div>

</x-Admin-layout>
