<x-Awner-layout>
    @include('base')
    <style>
        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

        .fade-out {
            animation: fadeOut 5s ease forwards;
        }
    </style>
    <div class="login-contect py-5">
        <div class="container py-xl-5 py-3">
            <div class="login-body">
                <div class="login p-4 mx-auto">
                    <h5 class="text-center mb-4">Add Your Operators</h5>
                    @if(session('success'))
                        <div class="alert alert-success fade-out" role="alert" id="successMessage">
                            {{ session('success') }}
                        </div>
                        {{ session()->forget('success') }} <!-- Clear success message from session -->
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger fade-out" role="alert" id="errorMessage">
                            {{ session('error') }}
                        </div>
                        {{ session()->forget('error') }} <!-- Clear error message from session -->
                    @endif

                    <form action="{{ route('AddOperatuer') }}" method="post">
                        @csrf
                        <span>Name</span>
                        <input type="text" class="form-control mt-3" name="name">
                        <span>Email</span>
                        <input type="email" class="form-control mt-3" name="email">
                        <span>Password</span>
                        <input type="password" class="form-control mt-3" name="password">
                        <select hidden name="role" class="mt-1" style="width: 100%" id="role">
                            <option value="2">Operator</option>
                        </select>
                        {{-- @if ($numberOfOperatorsWithSameResto < $userPlan->NumberOfOperateurs) --}}
                            <button class="btn btn-success submit mb-4" type="submit">Add Operators</button>
                        {{-- @else --}}
                            {{-- <p>Maximum number of operators reached</p>
                        @endif --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-Awner-layout>
