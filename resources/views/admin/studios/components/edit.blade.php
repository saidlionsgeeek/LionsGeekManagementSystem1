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
                    <div>
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $studio->name) }}"
                            required>
                    </div>
                    <div>
                        <label for="description">Description :</label>
                        <input type="text" name="description" id="description"
                            value="{{ old('description', $studio->description) }}" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modifiez</button>
            </div>
            </form>
        </div>
    </div>
</div>
