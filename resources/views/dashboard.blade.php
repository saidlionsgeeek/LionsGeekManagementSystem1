<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="text-center">
                    <h1 class="text-3xl font-semibold mb-4 text-indigo-600">
                        Hello, {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                    </h1>
                    <h4 class="text-lg font-semibold mb-2 text-gray-700">
                        Your roles:
                    </h4>
                    <ul class=" pl-8 text-base text-gray-600">
                        @forelse (auth()->user()->roles as $role)
                            <li>{{ $role->name }}</li>
                        @empty
                            <li>No roles assigned</li>
                        @endforelse
                    </ul>
                </div>

                <div class="mt-8">
                    <h2 class="text-2xl font-semibold text-indigo-600 mb-4">
                        Recent Activity
                    </h2>
                    <ul class="space-y-4 text-gray-700">
                        <li>
                            <span class="font-semibold">Logged in:</span> {{ now()->subMinutes(0)->diffForHumans() }}
                        </li>
                        <li>
                            <span class="font-semibold">Updated profile:</span> {{ now()->subHours(2)->diffForHumans() }}
                        </li>
                        <li>
                            <span class="font-semibold">Created a new post:</span> {{ now()->subDays(1)->diffForHumans() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
