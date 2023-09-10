<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $equipment->id }}">
    Edit the equipment
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $equipment->id }}" tabindex="-1" aria-labelledby="{{ $equipment->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $equipment->id }}Label">{{ $equipment->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.equipment.edit', $equipment->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input required class="form-control" type="text" name="name" id="name" value="{{ old('name', $equipment->name) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ref">Ref</label>
                        <input required class="form-control" type="text" name="ref" id="ref" value="{{ old('ref', $equipment->ref) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="stock">Stock</label>
                        <input required class="form-control" type="number" min="0" name="stock" id="stock" value="{{ old('stock', $equipment->stock) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="state">State</label>
                        <select required class="form-select" name="state" >
                            <option selected value={{ 1 }} >Working</option>
                            <option value={{ 0 }}>defective</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
