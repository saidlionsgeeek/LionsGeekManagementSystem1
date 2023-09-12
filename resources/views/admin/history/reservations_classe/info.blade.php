<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#Info{{ $reservation_classe->id }}MModal">
   I
</button>

<!-- Modal -->
<div class="modal fade" id="Info{{ $reservation_classe->id }}MModal" tabindex="-1"
    aria-labelledby="Info{{ $reservation_classe->id }}MModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-2xl text-center">{{ $reservation_classe->name }} by {{ $reservation_classe->user->name }}
                    at {{ $reservation_classe->classe->name }}
                </p>
                <?php echo date('F jS, Y', strtotime(substr($reservation_classe->start_time, 0, 10))); ?> - {{ substr($reservation_classe->start_time, -8, -3) }} to {{ substr($reservation_classe->end_time, -8, -3) }}
                <p><span class="text-lg font-medium">Description:</span> {{ $reservation_classe->description }} </p>

                </p>
                <p><span class="text-lg font-medium">Comment:</span> {{ $reservation_classe->comment }} </p>
                

            </div>
            <div class="modal-footer">
                <form action={{ route('reservation_classe.delete', $reservation_classe->id) }} method='POST'>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete Reservation Permanently</button>
                </form>
            </div>
        </div>
    </div>
</div>
