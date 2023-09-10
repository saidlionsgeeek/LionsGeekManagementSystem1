<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $studio->id }}">
    Modifiez le studio
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $studio->id }}" tabindex="-1" aria-labelledby="{{ $studio->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $studio->id }}Label">{{ $studio->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.studio.update', $studio->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Name :</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $studio->name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"  for="description">Description :</label>
                        <textarea class="form-control" type="text" name="description" id="description" cols="30" rows="4" requierd>{{ old('description', $studio->description) }}"</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modifiez</button>
            </div>
            </form>
        </div>
    </div>
</div>
