<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom d'equipment</th>
            <th scope="col">Ref</th>
            <th scope="col">Stock</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservation_studio_equipments as $r_equipment)
            <tr valign="middle">
                <td>{{ $r_equipment->equipement->name}}</td>
                <td>{{ $r_equipment->equipement->ref }}</td>
                <td>{{ $r_equipment->stock }}</td>
                <td>
                    <div class="flex gap-4 justify-center items-center">
                        @if ($reservation_studio->user_id == auth()->user()->id || auth()->user()->name == 'admin')
                        <form method="POST" action={{ route('reservation_studio_equipment.delete', $r_equipment->id) }}>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">X</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>