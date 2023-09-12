<form action={{ route('admin.equipment.destroy', $equipment->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class=" btn btn-danger text-white " onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')"><i class="fa-solid fa-trash-can"></i></button>
</form>
