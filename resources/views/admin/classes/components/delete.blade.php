@php
    $salles = ["Salle 1", "Salle 2", "Salle 3", "Salle 4", "Salle 5", "Salle 6"];
@endphp

@if (in_array($classe->name, $salles))
    <form action="{{ route('admin.classe.destroy', $classe->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" disabled class="btn btn-primary text-white">Supprimer classe</button>
    </form>
@else
<form action="{{ route('admin.classe.destroy', $classe->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"  class="btn btn-primary text-white">Supprimer classe</button>
</form>
@endif