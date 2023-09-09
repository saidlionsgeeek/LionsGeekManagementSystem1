 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Ajouter classe </button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter classe</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.classe.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Ajoutez un nom</label>
                        <input type="text" name="name" id="name">
                    </div>

                    <div>
                        <label for="description">Ajoutez une description</label>
                        <input type="text" name="description" id="description">
                    </div>

                    <div>
                        <label for="img_url">Images </label>
                        <input type="file" name="img_url[]" multiple id="img_url">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>