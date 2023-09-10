
@php
    $studios = ["Studio 1", "Studio 2", "Espace cafe", "Espace Agora", "Co-working", "Externe"];
@endphp

@if (in_array($studio->name, $studios))
<form action={{ route('admin.studio.destroy', $studio->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" disabled class=" btn btn-primary text-white ">supprimer classe</button>
</form>
@else
<form action={{ route('admin.studio.destroy', $studio->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class=" btn btn-primary text-white ">supprimer classe</button>
</form>
@endif