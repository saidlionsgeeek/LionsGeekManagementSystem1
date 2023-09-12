@php
    $salles = ["Salle 1", "Salle 2", "Salle 3", "Salle 4", "Salle 5", "Salle 6"];
@endphp

@if (in_array($classe->name, $salles))
    <form action="{{ route('admin.classe.destroy', $classe->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" disabled class="btn btn-danger text-white"><i class="fa-solid fa-trash-can"></i></button>
    </form>
@else
<form action="{{ route('admin.classe.destroy', $classe->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"  class="btn btn-danger text-white" onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')"><i class="fa-solid fa-trash-can"></i></button>
</form>
@endif