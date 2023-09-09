<x-app-layout>
    @include("admin.classes.components.create")
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de classe</th>
                <th scope="col">Description</th>

                <th scope="col">Ajoutez une image</th>
                <th scope="col">Voir plus</th>
                <th scope="col">Supprimez un classe</th>
                <th scope="col">Modifiez</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr valign="middle">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $classe->name }}</td>
                    <td>{{ $classe->description }}</td>
                    {{-- <td>@mdo</td> --}}
                    <td>
                        @include("admin.classes.components.create_imgs") 
                    </td>

                    <td>
                        @include("admin.classes.components.show_imgs")

                    </td>

                    {{-- la suppression du studio --}}
                    <td>
                        @include("admin.classes.components.delete")

                    </td>

                    <td>
                        @include("admin.classes.components.edit")
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</x-app-layout>
