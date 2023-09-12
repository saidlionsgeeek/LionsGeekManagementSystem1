<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#Info{{ $reservation_studio->id }}Modal">
    I
</button>

<!-- Modal -->
<div class="modal fade" id="Info{{ $reservation_studio->id }}Modal" tabindex="-1"
    aria-labelledby="Info{{ $reservation_studio->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-2xl text-center">{{ $reservation_studio->name }} by {{ $reservation_studio->user->name }}
                    at {{ $reservation_studio->studio->name }}
                </p>
                <?php echo date('F jS, Y', strtotime(substr($reservation_studio->start_time, 0, 10))); ?> - {{ substr($reservation_studio->start_time, -8, -3) }} to {{ substr($reservation_studio->end_time, -8, -3) }}
                <p><span class="text-lg font-medium">Description:</span> {{ $reservation_studio->description }} </p>

                </p>
                <p><span class="text-lg font-medium">Comment:</span> {{ $reservation_studio->comment }} </p>
                <div>
                    <span class="text-lg font-medium">Equipment Used:</span>
                    <ul class="list-group">
                        @foreach ($reservation_studio->reservation_studio_equipment as $rse)
                            <li class="list-group-item">{{ $rse->equipement->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <span class="text-lg font-medium">Team Members:</span>
                    <ul class="list-group">
                        @foreach ($reservation_studio->team_members as $tm)
                            <li class="list-group-item">{{ $tm->user->name }} {{ $tm->user->lastname }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <form action={{ route('reservation_studio.delete', $reservation_studio->id) }} method='POST'>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete Reservation Permanently</button>
                </form>
            </div>
        </div>
    </div>
</div>
