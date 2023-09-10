<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $classe->id }}">
    Modifiez le classe
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $classe->id }}" tabindex="-1" aria-labelledby="{{ $classe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $classe->id }}Label">{{ $classe->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.classe.update', $classe->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class='mb-3'>
                        <label class='form-label' for="name">Name :</label>
                        <input class='form-control' type="text" name="name" id="name"
                            value="{{ old('name', $classe->name) }}" required>
                    </div>
                    <div>
                        <label class="form-label" for="description">Description :</label>
                        <textarea class='form-control' type="text" name="description" id="description" required cols="30"
                            rows="4">value="{{ old('description', $classe->description) }}"</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modifiez</button>
            </div>
            </form>
        </div>
    </div>
</div>
