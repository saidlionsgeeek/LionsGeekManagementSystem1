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
            <div class="modal-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Prénom :</label>
                        <input class="mt-2 " type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="lastname">Nom :</label>
                        <input class="mt-2 ms-3" type="text" name="lastname" id="lastname">
                    </div>
                    <div>
                        <label for="cin"> CIN :</label>
                        <input class="mt-2 ms-4 " type="text" name="cin" id="cin">
                    </div>
                    <div>
                        <label for="gender">Sexe :</label>
                        <select class="ms-3 mt-2" name="gender" id="gender">
                            <option disabled selected>Choisissez le sexe</option>
                            <option value="homme">homme</option>
                            <option value="femme">femme</option>
                        </select>
                    </div>
                    <div>
                        <label for="phone"> Phone :</label>
                        <input class="mt-2 ms-2 " type="text" name="phone" id="phone">
                    </div>
                    <div>
                        <label for="email"> email :</label>
                        <input class="mt-2 ms-3" type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="type">Type :</label>
                        <select class="ms-3 mt-2" name="type" id="type">
                            <option disabled selected>Type: </option>
                            <option value="interne">interne</option>
                            <option value="externe">externe</option>
                        </select>
                    </div>
                    <fieldset>
                        <legend>Choisi les roles :</legend>

                        <div>
                            <label for="checklist[]">Gestionnaire des studios</label>
                            <input type="checkbox" id="checklist[]" name="checklist[]" value="Gestionnaire des studios" checked />
                        </div>

                        <div>
                            <label for="checklist[]">Gestionnaire des classes</label>
                            <input type="checkbox" id="checklist[]" name="checklist[]" value="Gestionnaire des classes" />
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
