<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add an Equipment
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add an Equipment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom d'equipment</th>
                            <th scope="col">Ref</th>
                            <th scope="col">Stock</th>
                            <th scope="col">State</th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipments as $equipment)
                            <tr valign="middle">
                                <td>{{ $equipment->name }}</td>
                                <td>{{ $equipment->ref }}</td>
                                <td>
                                    <p class="text-{{ $equipment->stock ? 'success' : 'danger' }}">{{ $equipment->stock }}</p>
                                </td>
                                <td>
                                    <p class="text-{{ $equipment->state ? 'success' : 'danger' }}">
                                        {{ $equipment->state ? 'Working' : 'Defective' }}</p>
                                </td>
                                <td>
                                    <form method="POST"
                                        action={{ route('reservation_studio_equipment.add', ['reservation_studio' => $reservation_studio->id, 'equipement' => $equipment->id]) }}>
                                        @csrf
                                        @if ($equipment->state && !($equipment->stock < 1))
                                            <button class="btn btn-success" type="submit">Add</button>
                                        @endif
                                        @if ($equipment->stock < 1 || !$equipment->state)
                                            <button disabled class="btn btn-danger" type="submit">Add</button>
                                        @endif



                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
