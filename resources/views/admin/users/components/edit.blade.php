<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#show{{ $user->id }}3">
    <i class="fa-solid fa-pen-to-square"></i>

</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $user->id }}3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="show{{ $user->id }}3Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="show{{ $user->id }}3Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
            
            <form action="{{ route('admin.user.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label class="form-label" for="name">Prénom :</label>
                    <input class="form-control " type="text" name="name" id="name" value="{{old('name',$user->name)}}">
                </div>
                <div>
                    <label class="form-label" for="lastname">Nom :</label>
                    <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('lastname',$user->lastname)}}">
                </div>
                <div>
                    <label class="form-label" for="cin"> CIN :</label>
                    <input class="form-control " type="text" name="cin" id="cin" value="{{old('cin',$user->cin)}}">
                </div>
                <div>
                    <label class="form-label"  for="gender">Sexe :</label>
                    <select class="form-select" name="gender" id="gender" value="{{old('gender',$user->gender)}}">
                        <option disabled selected>Choisissez le sexe</option>
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="phone"> Phone :</label>
                    <input class="form-control " type="text" name="phone" id="phone" value="{{old('phone',$user->phone)}}">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
</div>
        </div>
    </div>
</div>
