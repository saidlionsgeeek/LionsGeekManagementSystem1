<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ajouter Equipment
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Equipment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action={{ route('admin.equipment.store') }} method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input required class="form-control" type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="ref">Ref</label>
                    <input required class="form-control" type="text" name="ref" id="ref">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="stock">Stock</label>
                    <input required class="form-control" type="number" min="0" name="stock" id="stock">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="state">State</label>
                    <select required class="form-select" name="state" >
                        <option selected value={{ 1 }} >Working</option>
                        <option value={{ 0 }}>defective</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="img_url">Image</label>
                    <input required class="form-control" type="file" name="img_url" id="img_url">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Create</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>