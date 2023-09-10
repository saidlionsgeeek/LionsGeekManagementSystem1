<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#show{{$user->id}}1">
    Information
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="show{{$user->id}}1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="show{{$user->id}}1Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="show{{$user->id}}1Label">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-left">
          <p>name: {{$user->name}}</p>
          <p>Lastname: {{$user->lastname}}</p>
          <p>CIN: {{$user->cin}}</p>
          <p>Sexe : {{$user->gender}}</p>
          <p>type : {{$user->type}}</p>
          <p>email: {{$user->email}}</p>
          <p>verefication: {{$user->verification === 0 ?"Non vérifié": "vérifié"}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>