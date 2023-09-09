<x-app-layout>
    @include("admin.equipments.components.create")
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom d'equipment</th>
                <th scope="col">Ref</th>
                <th scope="col">Stock</th>
                <th scope="col">State</th>
                <th scope="col">Picture</th>
                <th scope="col">Supprimez un equipment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipments as $equipment)
                <tr valign="middle">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $equipment->name }}</td>
                    <td>{{ $equipment->ref }}</td>
                    <td>{{ $equipment->stock }}</td>
                    <td>
                        <form action={{ route('admin.equipment.state', $equipment->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="link text-{{ $equipment->state ? 'success' : 'danger' }}">{{ $equipment->state ? 'Working' : 'Defective' }}</button>
                        </form>
                    </td>
                    <td>
                        @include("admin.equipments.components.show_img") 
                    </td>
                    <td>
                        @include("admin.equipments.components.delete") 
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</x-app-layout>
