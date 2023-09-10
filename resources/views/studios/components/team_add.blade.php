<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teamAdd">
    Add a Team Member
</button>

<!-- Modal -->
<div class="modal fade" id="teamAdd" tabindex="-1" aria-labelledby="teamAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="teamAddLabel">Add a Team Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr valign="middle">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    <form method="POST"
                                        action={{ route('reservation_studio_team.add', ['reservation_studio' => $reservation_studio->id, 'user' => $user->id]) }}>
                                        @csrf
                                        <button class="btn btn-success" type="submit">Add</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
