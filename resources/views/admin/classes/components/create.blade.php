 <!-- Button trigger modal -->
 <div class=" text-center">
     <button type="button" class="btn btn-warning mt-5 mb-5 text-center fs-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
         <i class="fa-solid fa-plus"></i>
         Classe </button>
 </div>




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
                     <div class="mb-3">
                         <label class="form-label" for="name">Ajoutez un nom</label>
                         <input class="form-control" type="text" name="name" id="name">
                     </div>

                     <div class="mb-3">
                         <label class='form-label' for="description">Ajoutez une description:</label>
                         <textarea class='form-control' name="description" id="description" cols="30" rows="5"></textarea>
                     </div>

                     <div class='mb-3'>
                         <label class="form-label" for="img_url">Images </label>
                         <input class='form-control' type="file" name="img_url[]" multiple id="img_url">
                     </div>

                     <div class="modal-footer">
                         <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Create</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
