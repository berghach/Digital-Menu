<x-Awner-layout>
    @include('base')
    <div class="login-contect py-5">
        <div class="container py-xl-5 py-3">
            <div class="login-body">
                <div class="login p-4 mx-auto">
                    <h5 class="text-center mb-4">Add Your Operratuers</h5>
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
                        <form action="{{ route('AddOperatuer') }}" method="post">
                            @csrf
                            <span>Name</span>
                            <input type="text" class="form-control mt-3" name="name">
                            <span>email</span>
                            <input type="email" class="form-control mt-3" name="email">
                            <span>password</span>
                            <input type="password" class="form-control mt-3" name="password">
                            <select hidden name="role" class="mt-1" style="width: 100%" id="role">
                                <option value="2">Operatuer</option>
                            </select>
                            <button class="btn btn-success submit mb-4" type="submit">Add Operatuers</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </x-Awner-layout>
    