
@php
    $studios = ["Studio 1", "Studio 2", "Espace cafe", "Espace Agora", "Co-working", "Externe"];
@endphp

@if (in_array($studio->name, $studios))
<form action={{ route('admin.studio.destroy', $studio->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" disabled class=" btn btn-danger text-white "><i class="fa-solid fa-trash-can"></i></button>
</form>
@else
<form action={{ route('admin.studio.destroy', $studio->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class=" btn btn-danger text-white " onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')"><i class="fa-solid fa-trash-can"></i></button>
</form>
@endif