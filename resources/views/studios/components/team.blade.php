<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($team as $team_member)
            <tr valign="middle">
                <td>{{ $team_member->user->name}} {{ $team_member->user->lastname}} </td>
                <td>{{ $team_member->user->type }}</td>
                <td >
                    <form action={{ route('reservation_studio_team.delete', $team_member->id) }} method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">X</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>