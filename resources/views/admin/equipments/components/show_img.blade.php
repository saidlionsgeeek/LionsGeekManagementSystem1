<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example{{ $equipment->id }}Modal">
    See Picture
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="example{{ $equipment->id }}Modal" tabindex="-1" aria-labelledby="example{{ $equipment->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img src="{{ asset('storage/imgs/equipmentImgs/' . $equipment->img_url) }}" >
        </div>
      </div>
    </div>
  </div>