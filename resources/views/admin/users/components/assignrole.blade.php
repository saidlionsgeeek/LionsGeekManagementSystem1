<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#show{{ $user->id }}">
    <i class="fa-solid fa-pen-to-square"></i>

</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="show{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="show{{ $user->id }}Label"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <form action="{{route('admin.user.roles.update',$user->id),$user->id}}" method="POST">
                    @csrf

                    <div>
                        <label class="form-label" for="name">Ajouter un rôle</label>
                        <select class="form-select" name="role" id="role">
                            <option selected disabled>Choisis rôle</option>
                            @foreach ($roles as $role )
                            <option selected value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" onsubmit="return confirm('are you sure!');">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
