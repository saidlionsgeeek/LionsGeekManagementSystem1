<x-app-layout>
    @include("admin.studios.components.create")
    <table class="table container text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de l'espace</th>
                <th scope="col">Description</th>

                <th scope="col">Ajoutez une image</th>
                <th scope="col">Voir l'espace</th>
                <th scope="col">Supprimez</th>
                <th scope="col">Modifiez</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studios as $studio)
                <tr valign="middle">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $studio->name }}</td>
                    <td>@include("admin.studios.components.show_description")</td>
                    <td>
                        @include("admin.studios.components.create_imgs")
                    </td>

                    <td>
                        @include("admin.studios.components.show_img")
                    </td>

                    <td>
                        @include("admin.studios.components.delete")

                    </td>

                    <td>
                        @include("admin.studios.components.edit")
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</x-app-layout>
