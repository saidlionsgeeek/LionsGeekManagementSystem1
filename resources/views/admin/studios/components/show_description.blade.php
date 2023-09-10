<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example{{ $studio->id }}descriptionModal">
    voir description
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="example{{ $studio->id }}descriptionModal" tabindex="-1" aria-labelledby="example{{ $studio->id }}descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <p>{{$studio->description}}</p>
        </div>
      </div>
    </div>
  </div>