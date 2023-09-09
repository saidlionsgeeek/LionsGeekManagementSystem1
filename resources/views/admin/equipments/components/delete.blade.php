<form action={{ route('admin.equipment.destroy', $equipment->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class=" btn btn-danger text-white ">Delete Equipment</button>
</form>
