<!-- Button trigger modal -->
{{-- @foreach ($classe_images as $studio_image) --}}
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{ $classe->id }}">
    Ajouter une image
</button>
{{-- @endforeach --}}

{{-- @foreach ($classe_images as $classe_image) --}}
<div class="modal fade" id="modal_{{ $classe->id }}" tabindex="-1" aria-labelledby="modalLabel_{{ $classe->id }}"
    aria-hidden="true">
    <!-- Contenu du modal -->

    <!-- Modal -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">



                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.classe.images.store', $classe->id) }} method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- <div>
                        <label for="img_url">Images : </label>
                        <input type="file" name="img_url"  id="img_url">
                    </div> --}}
                    <div>
                        <label for="img_url">Images </label>
                        <input type="file" name="img_url[]" multiple id="img_url">
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}
</div>
