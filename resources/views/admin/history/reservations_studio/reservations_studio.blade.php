<table class="table align-middle">
    <thead>
        <tr>
            <th scope="col">Time</th>
            <th scope="col">User</th>
            <th scope="col">Status</th>
            <th scope="col">Info</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservations_studio as $reservation_studio)
            <tr >
                <td>
                    <?php echo date("F jS, Y", strtotime(substr($reservation_studio->start_time , 0, 10))); ?> - {{ substr($reservation_studio->start_time, -8, -3) }} to {{ substr($reservation_studio->end_time, -8, -3) }}
                </td>
                <td>
                    {{ $reservation_studio->user->name }} {{ $reservation_studio->user->lastname }}
                </td>
                <td>
                    {{ $reservation_studio->canceled ? 'Canceled' : ($reservation_studio->passed ? 'Passed' : 'Active') }}
                </td>
                <td>
                    @include('admin.history.reservations_studio.info')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    <form action="{{route('reservation_studio.studiohistory')}}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">send</button>
    </form>

