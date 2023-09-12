<x-app-layout>
    <div class="flex justify-center mt-4">
        {{-- <a href="/studios/{{ $s->id }}" class="px-2 text-decoration-none text-amber-600">{{ $s->name }}</a> --}}
    </div>

    <div>
        <p>Reservations Studio</p>
        @include('admin.history.reservations_studio.reservations_studio')
    </div>
    <div>
        <p>Reservations Classe</p>
        @include('admin.history.reservations_classe.reservations_classe')
    </div>
</x-app-layout>
