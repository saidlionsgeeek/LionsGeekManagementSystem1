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
        @foreach ($reservations_classe as $reservation_classe)
            <tr >
                <td>
                    <?php echo date("F jS, Y", strtotime(substr($reservation_classe->start_time , 0, 10))); ?> - {{ substr($reservation_classe->start_time, -8, -3) }} to {{ substr($reservation_classe->end_time, -8, -3) }}
                </td>
                <td>
                    {{ $reservation_classe->user->name }} {{ $reservation_classe->user->lastname }}
                </td>
                <td>
                    {{ $reservation_classe->canceled ? 'Canceled' : ($reservation_classe->passed ? 'Passed' : 'Active') }}
                </td>
                <td>
                    @include('admin.history.reservations_classe.info')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>