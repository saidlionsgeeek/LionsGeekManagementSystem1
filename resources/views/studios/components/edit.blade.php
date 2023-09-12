<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal"
    data-bs-target="#example{{ $reservation_studio->id }}Modal">
    Edit Reservation
</button>

<!-- Modal -->
<div class="modal fade" id="example{{ $reservation_studio->id }}Modal" tabindex="-1"
    aria-labelledby="example{{ $reservation_studio->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="example{{ $reservation_studio->id }}ModalLabel">Edit Reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('reservation_studio.edit', $reservation_studio->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input required class='form-control' type="text"
                            value={{ old('title', $reservation_studio->name) }} name="title">
                    </div>
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea required class='form-control' type="text" name="description">{{ old('description', $reservation_studio->description) }}</textarea>
                    </div>
                    <div>
                        <label for="comment" class="form-label">Comment</label>
                        <textarea required class='form-control' type="text" name="comment">{{ old('comment', $reservation_studio->comment) }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Reservation</button>
                </div>
            </form>
        </div>
    </div>
</div>
