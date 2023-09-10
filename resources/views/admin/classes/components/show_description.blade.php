<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example{{ $classe->id }}descriptionModal">
    voir description
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="example{{ $classe->id }}descriptionModal" tabindex="-1" aria-labelledby="example{{ $classe->id }}descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <p>{{$classe->description}}</p>
        </div>
      </div>
    </div>
  </div>