<x-app-layout>
    @include("admin.studios.components.create")
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de studio</th>
                <th scope="col">Description</th>

                <th scope="col">Ajoutez une image</th>
                <th scope="col">Voir plus</th>
                <th scope="col">Supprimez un studio</th>
                <th scope="col">Modifiez</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studios as $studio)
                <tr valign="middle">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $studio->name }}</td>
                    <td>@include("admin.studios.components.show_description")</td>
                    {{-- <td>@mdo</td> --}}
                    <td>
                        @include("admin.studios.components.create_imgs")
                    </td>

                    <td>
                        @include("admin.studios.components.show_img")
                    </td>

                    {{-- la suppression du studio --}}
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
