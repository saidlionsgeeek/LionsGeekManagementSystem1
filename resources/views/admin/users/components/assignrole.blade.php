<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#show{{ $user->id }}">
    mofifer les role
</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="show{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="show{{ $user->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.user.roles.update',$user->id),$user->id}}" method="POST">
                    @csrf

                    <div>
                        <label for="name">Ajouter un role</label>
                        <select name="role" id="role">
                            <option selected disabled>choisi role</option>
                            @foreach ($roles as $role )
                            <option selected value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" onsubmit="return confirm('are you sure!');">submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
