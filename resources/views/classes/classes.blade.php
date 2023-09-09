<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            var calendarEl = document.getElementById('calendar'); 

            if (calendarEl == null) return;


            const {
                data
            } = await axios.get('/api/reservation_classe'); // Get all the studio reservations from our api route already JSON formatted

            const reservations = data.reservation_classe.filter(reservation => reservation.classe_id ==
                {{ $classe->id }}) // Filter our reservations by a specific studio

            console.log(reservations) // This is how professionals debug btw 




            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'timeGridWeek',
                slotMinTime: "08:00:00",
                slotMaxTime: "18:00:00",

                eventClick: async function(info) { // To be triggered when you click on a reservation
                    const reservation = reservations.find(reservation => reservation.title == info
                        .event.title); // Get the specific reservation you clicked upon

                    window.location.href =
                        `/classe/${reservation.classe_id}/reservations/${reservation.id}` // Change the URL to go to a dedicated view page for our reservation

                },

                events: reservations, // Pass the filtered reservation to our Calendar
                height: 'auto',
            });

            calendar.setOption('locale', 'fr');
            calendar.render();
        });
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <div class="flex justify-center mt-4">
            @foreach ($classes as $c)
                <a href="/classes/{{ $c->id }}" class="px-2 underline text-amber-600">{{ $c->name }}</a>
            @endforeach
        </div>
        <h1 class="text-center text-5xl pt-8">{{ $classe->name }}</h1>
        <div class="flex justify-center">
            @role(['admin', 'Gestionnaire des classes'])
            @include('classes.components.create')
            @endrole
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</body>

</html>
