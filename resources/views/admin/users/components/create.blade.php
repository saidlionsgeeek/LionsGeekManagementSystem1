<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usercreate">
    crée un utilisateur
</button>

<!-- Modal -->
<div class="modal fade" id="usercreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="usercreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="usercreateLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Prénom :</label>
                        <input class=" form-control " type="text" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="lastname">Nom :</label>
                        <input class=" form-control " type="text" name="lastname" id="lastname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cin"> CIN :</label>
                        <input class=" form-control  " type="text" name="cin" id="cin">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gender">Sexe :</label>
                        <select class="  form-control" name="gender" id="gender">
                            <option disabled selected>Choisissez le sexe</option>
                            <option value="homme">homme</option>
                            <option value="femme">femme</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone"> Phone :</label>
                        <input class=" form-control  " type="text" name="phone" id="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email"> Email :</label>
                        <input class=" form-control " type="email" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="type">Type :</label>
                        <select class="  form-control" name="type" id="type">
                            <option disabled selected>Type: </option>
                            <option value="interne">interne</option>
                            <option value="externe">externe</option>
                        </select>
                    </div>
                    <fieldset>
                        <legend>Sélectionne les rôles</legend>

                        <div>
                            <input class="form-check-input" type="checkbox" id="checklist[]" name="checklist[]" value="Gestionnaire des studios" checked />
                            <label class="form-check-label" for="checklist[]">Gestionnaire des studios</label>
                        </div>

                        <div>
                            <input class="form-check-input" type="checkbox" id="checklist[]" name="checklist[]" value="Gestionnaire des classes" />
                            <label class="form-check-label" for="checklist[]">Gestionnaire des classes</label>
                        </div>
                    </fieldset>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
