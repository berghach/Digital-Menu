<x-Awner-layout>

@include('base')
<form action="{{ route('awners.update', $operator->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Use PUT method for update -->
    <span>Name</span>
    <input type="text" class="form-control mt-3" name="name" value="{{ $operator->name }}">
    <span>Email</span>
    <input type="email" class="form-control mt-3" name="email" value="{{ $operator->email }}">
    <span>Password</span>
    <input type="password" class="form-control mt-3" name="password">
    <!-- Keep the role field hidden if it's not editable -->
    <input type="hidden" name="role" value="{{ $operator->role }}">
    <button class="btn btn-success submit mb-4" type="submit">Update Operator</button>
</form>
</x-Awner-layout>
