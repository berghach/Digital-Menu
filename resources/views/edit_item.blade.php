<form action="{{ route('items.update', $item) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $item->name }}" placeholder="Name"><br>
    <input type="text" name="description" value="{{ $item->description }}" placeholder="Description"><br>
    <select style="width: 100%" name="menu_id" id="menu_id">
        <option value="">Change the menu</option>
        @foreach ($menus as $menu)
            <option value="{{ $menu->id }}" {{ $item->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
        @endforeach
    </select>
    <button type="submit">Update</button>
</form>
