<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($team as $team_member)
            <tr valign="middle">
                <td>{{ $team_member->user->name}}</td>
                <td>{{ $team_member->user->type }}</td>
            </tr>
        @endforeach
    </tbody>
</table>