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
                <h5 class="text-center mb-4">Add Your Menu</h5>
                @if(session('success'))
                <div class="alert alert-success" role="alert" id="successMessage">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
            <div class="alert alert-success" role="alert" id="successMessage">
                {{ session('error') }}
            </div>
        @endif
            
            <script>    
                setTimeout(function(){
                    var successMessage = document.getElementById('successMessage');
                    if(successMessage) {
                        successMessage.remove();
                    }
                }, 3000);
            </script>
                    {{-- @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif --}}
<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <span for="name">Menu Name:</span>
        <input type="text" name="name" id="name" class="form-control mt-3" required>
    </div>
    <div class="form-group">
        <span for="description">Menu Description:</span>
        <input type="text" name="description" id="description" class="form-control mt-3" required>
    </div>
    <div class="form-group">
        <span for="media">ADD vedio Or image:</span>
        <input type="file" name="media" id="media" class="form-control mt-3" accept="image/*,video/*" required>
    </div>
    <button type="submit" class="btn btn-success submit mb-4">Submit</button>
</form>
</x-Awner-layout>