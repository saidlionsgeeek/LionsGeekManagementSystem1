<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#example{{ $classe->id }}Modal">
    Make a New Class Reservation
</button>

<!-- Modal -->
<div class="modal fade" id="example{{ $classe->id }}Modal" tabindex="-1"
    aria-labelledby="example{{ $classe->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="example{{ $classe->id }}ModalLabel">Make a New classe Reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('reservation_classe.create', $classe->id) }}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input required class='form-control' type="text" name="title">
                    </div>
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea required class='form-control' type="text" name="description"></textarea>
                    </div>
                    <div>
                        <label for="day_date" class="form-label">Day</label>
                        <input required class='form-control' type="date" name="day_date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y'); ?>-12-31"
                            value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div>
                        <label for="start_time" class="form-label">Start</label>
                        <input required class='form-control' type="time" min="08:00" max="18:00" value='09:00' step="3600"
                            name="start_time">
                    </div>
                    <div>
                        <label for="end_time" class="form-label">End</label>
                        <input required class='form-control' type="time" min="08:00" max="18:00" value='10:00' step="3600"
                            name="end_time">
                    </div>
                    <div>
                        <label for="comment" class="form-label">Comment</label>
                        <textarea required class='form-control' type="text" name="comment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Reservation</button>
                </div>
            </form>
        </div>
    </div>
</div>
