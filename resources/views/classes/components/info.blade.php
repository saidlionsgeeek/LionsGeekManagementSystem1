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
                    <p class="text-2xl text-center">{{ $reservation_classe->name }} by {{ auth()->user()->name }} at {{ $reservation_classe->classe->name }}</p>
                    <p><span class="text-lg font-medium">Description:</span> {{ $reservation_classe->description }} </p>
                    <p>Starts at {{ $reservation_classe->start_time }} and Ends at {{ $reservation_classe->end_time }}
                    </p>
                    <p><span class="text-lg font-medium">Comment:</span> {{ $reservation_classe->comment }} </p>
                    
                    @if ($reservation_classe->user_id == auth()->user()->id || auth()->user()->name == 'admin')
                    <div class="flex justify-evenly">
                        <form action={{ route('reservation_classe.delete', $reservation_classe->id) }} method='POST'>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete Reservation</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</x-app-layout>