<x-app-layout>
    @include("admin.equipments.components.create")
    <table class="table container">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom d'equipment</th>
                <th scope="col">Ref</th>
                <th scope="col">Stock</th>
                <th scope="col">Etat</th>
                <th scope="col">Image</th>
                <th scope="col" class=" text-center">Modifier l'equipment</th>
                <th scope="col" class=" text-center">Supprimez l'equipment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipments as $equipment)
                <tr valign="middle">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class=" w-25">{{ $equipment->name }}</td>
                    <td>{{ $equipment->ref }}</td>
                    <td>{{ $equipment->stock }}</td>
                    <td>
                        <form action={{ route('admin.equipment.state', $equipment->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="link text-{{ $equipment->state ? 'success' : 'danger' }}" onclick="return confirm('Êtes-vous sûr de changer l etat de l equipment?')">{{ $equipment->state ? 'Working' : 'Defective' }}</button>
                        </form>
                    </td>
                    <td>
                        @include("admin.equipments.components.show_img") 
                    </td>
                    <td class=" text-center">
                        @include("admin.equipments.components.edit") 
                    </td>
                    <td class=" text-center">
                        @include("admin.equipments.components.delete") 
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</x-app-layout>
