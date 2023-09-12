<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="text-2xl text-center">{{ $reservation_studio->name }} by {{ $reservation_studio->user->name }} at {{ $reservation_studio->studio->name }}</p>
                    <p><span class="text-lg font-medium">Description:</span> {{ $reservation_studio->description }} </p>
                    <p>Starts at {{ $reservation_studio->start_time }} and Ends at {{ $reservation_studio->end_time }}
                    </p>
                    <p><span class="text-lg font-medium">Comment:</span> {{ $reservation_studio->comment }} </p>
                    @include('studios.components.equipment')
                    @include('studios.components.team')
                    
                    @if ($reservation_studio->user_id == auth()->user()->id || auth()->user()->roles[0]->name == 'admin')
                    <div class="flex justify-evenly">
                        @include('studios.components.equipment_add')
                        @include('studios.components.team_add')
                        <form action={{ route('reservation_studio.cancel', $reservation_studio->id) }} method='POST'>
                            @csrf
                            @method('PUT')
                            <button class="btn btn-danger" type="submit">Cancel Reservation</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
