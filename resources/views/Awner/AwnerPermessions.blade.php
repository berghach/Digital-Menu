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
                    <h5 class="text-center mb-4">Assign Permissions to Operator</h5>
                    @if(session('success'))
                        <div class="alert alert-success fade-out" role="alert" id="successMessage">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger fade-out" role="alert" id="successMessage">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('assignPermissionsToOperator') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="operator_id">Select Operator:</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="">Select Operatuer</option>
                                    @foreach($operators as $operator)
                                    <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permissions">Select Permissions:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="delete Item" name="delete Item">
                                <label class="form-check-label" for="delete_Item">Delete Item</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="update Item" name="update Item">
                                <label class="form-check-label" for="update_Item">Update Item</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="add Item" name="add Item">
                                <label class="form-check-label" for="add_Item">Add Item</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="add menu" name="add menu">
                                <label class="form-check-label" for="add_menu">Add Menu</label>
                            </div>
                        </div>
                        <button class="btn btn-success submit mb-4" type="submit">Assign Permissions</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-Awner-layout>
